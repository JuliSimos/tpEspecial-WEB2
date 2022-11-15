# API-REST de una pagina de peliculas

## Indice

Peliculas
1. [metodos get](#metodos-get-peliculas)
2. metodo post
3. metodo put

Generos

1. metodos get pelicula
2. metodos post
3. metodos put

Reviews
1. metodos get
2. metodo post
3. metodos put

### metodos get peliculas

Se listan los metodos para devolver el listado de peliculas, generos y comentarios u obtener un elemento especifico de cada uno.
Ademas el listado de peliculas cuenta con un metodo get para listarlas de forma descendiente o ascendente, o tambien filtrando por columna

##parametros validos
valores permitidos para los metodos get


##peliculas
campos: nombre, sinopsis, fehca, pais, direccion, id_genero_fk
sort: nombre, sinopsis, fecha, pais, direccion
order: descendente o ascendente

>get peliculas - devuelve el listado completo de peliculas.
```
  http://localhost/WEB2/TpEspecial-API/api/peliculas
  ```
  
>get listado de peliculas filtradas por cualquier columna
```
http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=nombre&filtro=Argentina
```

>get listado de cualqueier columna ordenada asc o desc
```
http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=fecha&order=asc
http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=fecha&order=desc
```

>get pelicula individual por id
```
http://localhost/WEB2/TpEspecial-API/api/peliculas/:ID
```
