%matplotlib inline

import time as time
from sklearn import datasets, cluster
import numpy as np
import matplotlib.pyplot as plt
from mpl_toolkits.mplot3d import Axes3D
import psycopg2 as pg
import pandas as pd
import pandas.io.sql as psql
import requests


np.random.seed(2)
#conn = pg.connect("dbname=maestria user=postgres password=cntja12xxx host=localhost")
conn = pg.connect(database='datos_gye', user='postgres', password='admin1234',host='52.38.27.79',port='5432')


# no hay conexion con base de gye x eso se realiza consulta a la base anterior
#df =  psql.read_sql("SELECT longitude,latitude FROM base.california limit 5000",conn)
df =  psql.read_sql("SELECT * FROM trayectoria_gye_hist limit 5000 ",conn)
coords = df.as_matrix(columns=['latitud', 'longitud']) # se consulta estos campos
#coords = dataframe2.as_matrix()


st = time.time()
n_cluster=3
k_means = cluster.KMeans(n_clusters=n_cluster)
X = np.radians(coords) #convierte la data en radianes
k_means.fit(coords) 
elapsed_time = time.time() - st
labels = k_means.labels_
num_clusters = len(set(labels))
core_samples_mask = np.zeros_like(n_cluster, dtype=bool)
centroids = k_means.cluster_centers_
print("Tiempo transcurrido: %.2fs" % elapsed_time)
print("Número de puntos: %i" % labels.size)


lats, lons = zip(*centroids)
#---rep_points = pd.DataFrame(centroids)
# from these lats/lons create a new df of one representative point for each cluster
rep_points = pd.DataFrame({'longitud':lons, 'latitud':lats})


for index, row in rep_points.iterrows():
    lon = str(row['longitud'])
    lat = str(row['latitud'])
    r = requests.post('http://18.228.88.39/user/dev/api/v2/sql?q=INSERT INTO centroides_dbscancal(the_geom, lon, lat) values(ST_SetSRID(ST_Point(' + lon + ',' + lat +'),4326),' + lon + ',' + lat + ')&api_key=2f82b43eda9e9a06b6552bfd8d37b04162201289')

rep_points


rep_points.to_csv('data/Kmean/centroides-KmeanCal.csv', encoding='utf-8') #devuelve arreglos
df.to_csv('data/Kmean/DataSetCal.csv', encoding='utf-8') #definir rep_points


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


plt.title('KMEAN Numero Estimado de Clusters: %d' % num_clusters)
print("Tiempo transcurrido: %.2fs" % elapsed_time)
print("Número de puntos: %i" % labels.size)
plt.xlabel('Latitud')
plt.ylabel('Longitud')
plt.savefig('images/KmeansCal.png', dpi=300, bbox_inches='tight', pad_inches=0.1) #me guarda el grafico como imagen
plt.show()