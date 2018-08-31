import psycopg2 as pg
import pandas as pd
import pandas.io.sql as psql

import numpy as np

from sklearn.cluster import DBSCAN
from sklearn import metrics
from sklearn.datasets.samples_generator import make_blobs
from sklearn.preprocessing import StandardScaler
import time as time
from mpl_toolkits.mplot3d import Axes3D
import matplotlib.pyplot as plt
from geopy.distance import great_circle
from shapely.geometry import MultiPoint
import requests


#CONEXION CON LA BASE DE DATOS GYE
conn2 = pg.connect(database='datos_gye', user='postgres', password='admin1234',host='52.38.27.79',port='5432')
#conn3 = pg.connect(database='prueba', user='postgres', password='admin1234',host='52.38.27.79',port='5432')

#CONEXION CON LA BASE DE DATOS CALIFORNIA 
#conn = pg.connect("dbname=maestria user=postgres password=cntja12xxx host=localhost")

#Obtencion de datos para new table
#df1 =  psql.read_sql("SELECT * FROM trayectoria ",conn3)
#coords1 = df.as_matrix(columns=['latitud', 'longitud'])
#coords1



#dataframe = psql.read_sql ("SELECT DISTINCT file_name FROM base.california limit 100", conn )

#df =  psql.read_sql("SELECT longitude,latitude FROM base.california limit 5000",conn)
df =  psql.read_sql("SELECT * FROM trayectoria_gye_hist limit 5000 ",conn2)
coords = df.as_matrix(columns=['latitud', 'longitud'])


#query que extrae los datos en un dataframe
#df = psql.read_sql ("SELECT * FROM trayectoria_gye ", conn2) 
#Convertidor de dataframe a matriz o arreglos
#coords = df.as_matrix(columns=['latitud', 'longitud'])
kms_per_radian = 6371.0088
epsilon = 0.05 / kms_per_radian



st = time.time()
db = DBSCAN(eps=epsilon, min_samples=1, algorithm='ball_tree', metric='haversine').fit(np.radians(coords))
elapsed_time = time.time() - st
cluster_labels = db.labels_

# get the number of clusters


num_clusters = len(set(cluster_labels))
core_samples_mask = np.zeros_like(db.labels_, dtype=bool)
core_samples_mask[db.core_sample_indices_] = True
labels = db.labels_

# all done, print the outcome
message = 'Agrupado {:,} puntos hasta {:,} clústeres, para {:.1f}% compresión en {:,.2f} Segundos'
print(message.format(len(df), num_clusters, 100*(1 - float(num_clusters) / len(df)), time.time()-st))
#print('Silhouette coefficient: {:0.03f}'.format(metrics.silhouette_score(coords, cluster_labels)))


# convertir los clusters en una serie de pandas, donde cada elemento es un grupo de puntos
clusters = pd.Series([coords[cluster_labels==n] for n in range(num_clusters)])
algo = pd.Series.to_frame(clusters) 


def get_centermost_point(cluster):
    centroid = (MultiPoint(cluster).centroid.x, MultiPoint(cluster).centroid.y)
    centermost_point = min(cluster, key=lambda point: great_circle(point, centroid).m)
    return tuple(centermost_point)


centermost_points = clusters.map(get_centermost_point)


# unzip the list of centermost points (lat, lon) tuples into separate lat and lon lists
lats, lons = zip(*centermost_points)

# from these lats/lons create a new df of one representative point for each cluster
rep_points = pd.DataFrame({'longitud':lons, 'latitud':lats})


for index, row in rep_points.iterrows():
    lon = str(row['longitud'])
    lat = str(row['latitud'])
    r = requests.post('http://18.228.88.39/user/dev/api/v2/sql?q=INSERT INTO centroides_dbscancal(the_geom, lon, lat) values(ST_SetSRID(ST_Point(' + lon + ',' + lat +'),4326),' + lon + ',' + lat + ')&api_key=2f82b43eda9e9a06b6552bfd8d37b04162201289')

rep_points


rep_points.to_csv('data/DbScan/centroides-dbscanCal.csv', encoding='utf-8')
algo.to_csv('data/DbScan/clustes-dbscancal.csv', encoding='utf-8')
df.to_csv('data/DbScan/DataSetCal.csv', encoding='utf-8')



# Plot result
import matplotlib.pyplot as plt

# Black removed and is used for noise instead.
unique_labels = set(labels)
colors = [plt.cm.Spectral(each)
    for each in np.linspace(0, 1, len(unique_labels))]


for k, col in zip(unique_labels, colors):
    if k == -1:
      # Black used for noise.
      col = [0, 0, 0, 1]
    class_member_mask = (labels == k)
    xy = coords[class_member_mask & core_samples_mask]
    plt.plot(xy[:, 0], xy[:, 1], 'o', markerfacecolor=tuple(col), markeredgecolor='k', markersize=14)
    xy = coords[class_member_mask & ~core_samples_mask]
    plt.plot(xy[:, 0], xy[:, 1], 'o', markerfacecolor=tuple(col), markeredgecolor='k', markersize=6)



plt.title('DBSCAN Numero Estimado de Clusters: %d' % num_clusters)
print("Tiempo transcurrido: %.2fs" % elapsed_time)
print("Número de puntos: %i" % labels.size)
plt.xlabel('Latitud')
plt.ylabel('Longitud')
plt.savefig('images/dbScanCal.png', dpi=300, bbox_inches='tight', pad_inches=0.1)
plt.show()