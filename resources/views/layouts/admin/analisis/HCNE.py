import time as time
import numpy as np
import matplotlib.pyplot as plt
import mpl_toolkits.mplot3d.axes3d as p3
from sklearn.cluster import AgglomerativeClustering
from sklearn.datasets.samples_generator import make_swiss_roll
from postlearn.cluster import compute_centers, plot_decision_boundry
import psycopg2 as pg
import pandas as pd
import pandas.io.sql as psql


#CONEXION CON LA BASE DE DATOS CALIFORNIA 
#conn = pg.connect("dbname=maestria user=postgres password=cntja12xxx host=localhost")
conn = pg.connect(database='datos_gye', user='postgres', password='admin1234',host='52.38.27.79',port='5432')
df =  psql.read_sql("SELECT * FROM trayectoria_gye_hist limit 5000",conn)
coords = df.as_matrix(columns=['latitud', 'longitud'])

#dataframe = psql.read_sql ("SELECT DISTINCT file_name FROM base.california limit 100", conn )
#df =  psql.read_sql("SELECT longitude,latitude FROM base.california limit 5000",conn)
#coords = df.as_matrix(columns=['latitude', 'longitude'])


print("AGRUPAMIENTO NO ESTRUTURADO...")
n_cluster=3
st = time.time()
ward = AgglomerativeClustering(n_clusters=n_cluster, linkage='ward').fit(coords)
elapsed_time = time.time() - st
labels = ward.labels_
core_samples_mask = np.zeros_like(n_cluster, dtype=bool)
num_clusters = len(set(labels))
#centroids = k_means.cluster_centers_
print("Elapsed time: %.2fs" % elapsed_time)
print("Number of points: %i" % labels.size)
print("Number of cluster: %i" % num_clusters)
result = compute_centers(ward,coords)
result


lats, lons = zip(*result)
#centroids = AgglomerativeClustering.cluster_centers
rep_points = pd.DataFrame({'longitud':lons, 'latitud':lats})
rep_points.to_csv('data/HCne/centroides-HCne.csv', encoding='utf-8')
df.to_csv('data/HCne/DataSetCal.csv', encoding='utf-8')
rep_points



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

    

plt.title('HCNE Numero Estimado de Clusters: %d' % num_clusters)
print("Tiempo transcurrido: %.2fs" % elapsed_time)
print("Número de puntos: %i" % labels.size)
plt.xlabel('Latitud')
plt.ylabel('Longitud')
plt.savefig('images/HCNE.png', dpi=300, bbox_inches='tight', pad_inches=0.1)
plt.show()