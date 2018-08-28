library(DBI)
library(RPostgres)

args    <- commandArgs(TRUE)
#parametros
usuario <- args[1]
cluster <- args[2]
#conexion a la base
conn=dbConnect(RPostgres :: Postgres (),host="52.38.27.79",port="5432",dbname="datos_gye",user="postgres",password="admin1234")
#Concatenar usuario
query<-"SELECT latitud,longitud FROM public.trayectoria_gye_hist where usuario like'%"
query_two<-paste(query,usuario)
query_tree<-"%'"
queryfor<-paste(query_two,query_tree)
#extraer los datos
datos_query=dbGetQuery(conn,queryfor)
#agrupar los datos
datos<-rbind(datos_query)
#generar analisis kmeans
kmeans.res<-kmeans(datos,center=cluster)
#guardar imagen
#jpeg("C:/Users/jcheverria/Desktop/Jorge Cheverria/fci/prueba/public/img/images/analisis2.jpeg", width = 800, height = 600)
jpeg("/home/kbaque/Archivos Kev/UG/Tesis/fci/public/img/images/analisis2.jpeg", width = 800, height = 600)
#realiza el grafico
plot(datos,col=kmeans.res$cluster)
#pinta el cluster
points(kmeans.res$centers,cex=2,col=11,pch=19)
dev.off()
