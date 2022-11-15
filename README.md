<details>
<summary>Indice</summary>
<h3>Peliculas</h3>
  <ul>
    <li><a href="#getPeliculas">GET Peliculas</a></li>
    <li><a href="#postPeliculas">POST Peliculas</a></li>
    <li><a href="#putPeliculas">PUT Peliculas</a></li>
  </ul>
  
  <h3>Generos</h3>
  <ul>
    <li><a href="#getGeneros">GET generos</a></li>
    <li><a href="#postGeneros">POST generos</a></li>
    <li><a href="#putGeneros">PUT generos</a></li>
  </ul>
  
   <h3>Reviews</h3>
  <ul>
    <li><a href="#getReviews">GET reviews</a></li>
    <li><a href="#postReviews">POST reviews</a></li>
    <li><a href="#putReviews">PUT reviews</a></li>
  </ul>
  
</details>

<a name="getPeliculas"></a>

# Peliculas

Se listan los metodos para devolver el listado de peliculas  u obtener una pelicula en especifico. Ademas el listado de peliculas cuenta con un metodo get para listarlas de forma descendiente o ascendente, o tambien filtrando por columna

### Parametros permitidos para los metodos get:
>
> peliculas campos: nombre, sinopsis, fehca, pais, direccion, id_genero_fk 
>
> sort: nombre, sinopsis, fecha, pais, direccion 
>
> order: descendente o ascendente
>
> filtro: cualquier palabra

## Metodo GET peliculas
> Devuelve el listado completo de peliculas.
 ``` 
   http://localhost/WEB2/TpEspecial-API/api/peliculas
 ```

### Metodo Get filtro
> Listado de peliculas filtradas por cualquier columna
``` 
 http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=nombre&filtro=Argentina
```
<details>
<summary>Ejemplos</summary>


> Url utilizando los parametros para poder filtrar:
```
http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=nombre&filtro=Argentina

http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=fecha&filtro=2022

http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=pais&filtro=Argentina

http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=direccion&filtro=brad
```
</details>

### Metodo GET columna ordenada
> get listado de cualqueier columna ordenada ascendente o descendente

``` 
 http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=fecha&order=asc
```
<details>
<summary>Ejemplos</summary>


```
http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=fecha&order=desc

http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=nombre&order=asc

http://localhost/WEB2/TpEspecial-API/api/peliculas?sort=pais&order=desc
```
</details>

## Metodo GET para una pelicula

> get pelicula individual por id

``` 
 http://localhost/WEB2/TpEspecial-API/api/peliculas/:ID
```

<details>
<summary>Ejemplos</summary>


``` 
http://localhost/WEB2/TpEspecial-API/api/peliculas/23

http://localhost/WEB2/TpEspecial-API/api/peliculas/25

http://localhost/WEB2/TpEspecial-API/api/peliculas/40

```
</details>

<a name= "postPeliculas"></a>

## Metodo POST peliculas

> Metodo para insertar nuevas peliculas en la BBDD
```
http://localhost/WEB2/TpEspecial-API/api/peliculas
```
<details>
<summary>Ejemplos</summary>

``` json
{
"nombre": "Los increibles",
"sinopsis": "Un superhéroe retirado lucha contra el aburrimiento y, junto a su familia, tiene la oportunidad de salvar al mundo.",
"fecha": 2004,
"pais": "EEUU", 
"direccion": "Brad Bird",
"id_genero_fk": 2
}
```

``` json
{
"nombre": "Guerra mundial Z",
"sinopsis": "Un empleado de la ONU pelea contra el tiempo y el destino mientras viaja por el mundo intentando frenar una pandemia mortal de zombis",
"fecha": 2013,
"pais": "EEUU", 
"direccion": "Marc Forster",
"id_genero_fk": 5
}
```

``` json
{
"nombre": "La familia del futuro",
"sinopsis": "El niño genio Lewis pierde la esperanza de recuperar su más reciente invento, el cual fue robado por Bowler Hat Guy, entonces un joven viajero en el tiempo llamado Wilbur Robinson llega a la escena para desaparecer a Lewis en su máquina del tiempo.",
"fecha": 2013,
"pais": "EEUU", 
"direccion": "Stephen J. Anderson",
"id_genero_fk": 2
}
```
</details>

<a name= "putPeliculas"></a>

## Metodo PUT peliculas

> Metodo para editar a traves de una id de una pelicula especificada por URL
```
http://localhost/WEB2/TpEspecial-API/api/peliculas/:ID
```
<details>
<summary>Ejemplos</summary>

``` json
{
        "nombre": "El hombre invisible",
        "sinopsis": "asdfgf",
        "fecha": 2011,
        "pais": "Alemania",
        "direccion": "fulanito",
        "id_genero_fk": 45
    }
```

``` json
{
        "nombre": "El hombre invisible",
        "sinopsis": "Enola Holmes asume su primer caso como detective, pero para desentrañar el misterio de una niña desaparecida necesitará la ayuda de sus amigos y            de su hermano, Sherlock",
        "fecha": 2020,
        "pais": "Reino Unido",
        "direccion": "Harry Bradbeer",
        "id_genero_fk": 6
    }
```
</details>

<a name="getGeneros"></a>

# Generos
 Se lista los metodos para devolver el listado de generos y tambien obtener un genero en especifico.
 
 ## Metodo GET generos
> Devuelve el listado completo de generos.
 ``` 
   http://localhost/WEB2/TpEspecial-API/api/generos
 ```
 
 ## Metodo GET para un genero

> get genero individual por id

``` 
 http://localhost/WEB2/TpEspecial-API/api/generos/:ID
```

<details>
<summary>Ejemplos</summary>


``` 
http://localhost/WEB2/TpEspecial-API/api/generos/6

http://localhost/WEB2/TpEspecial-API/api/generos/45

http://localhost/WEB2/TpEspecial-API/api/generos/50

```
</details>

<a name="postGeneros"></a>

## Metodo POST generos

> Metodo para insertar nuevos generos en la BBDD
```
http://localhost/WEB2/TpEspecial-API/api/generos
```
<details>
<summary>Ejemplos</summary>

``` json
{
    "genero": "Surrealista"
}
```

``` json
{
    "genero": "Ciencia Ficcion"
}
```

``` json
{
    "genero": "Musical"
}
```
</details>
 
 <a name="putGeneros"></a>
 
## Metodo PUT generos

> Metodo para editar a traves de una id a un genero especificado por URL
```
http://localhost/WEB2/TpEspecial-API/api/generos/:ID
```
<details>
<summary>Ejemplos</summary>

``` json
{
    "genero": "Fantasia"
}
```

``` json
{
    "genero": "Comedia"
}
```
</details>

<a name="getReviews"></a>

# Review
 Se lista los metodos para devolver el listado de comentarios y tambien obtener un comentario en especifico.
 
 ## Metodo GET comentarios
> Devuelve el listado completo de generos.
 ``` 
   http://localhost/WEB2/TpEspecial-API/api/comentarios
 ```
 
 ## Metodo GET para un comentario

> Obtengo un comentario individual por id

``` 
 http://localhost/WEB2/TpEspecial-API/api/comentarios/:ID
```

<details>
<summary>Ejemplos</summary>


``` 
http://localhost/WEB2/TpEspecial-API/api/comentarios/1

http://localhost/WEB2/TpEspecial-API/api/comentarios/4

http://localhost/WEB2/TpEspecial-API/api/comentarios/5

```
</details>

<a name="postReviews"></a>

## Metodo POST comentario

> Metodo para insertar nuevos comentarios en la BBDD
```
http://localhost/WEB2/TpEspecial-API/api/comentarios
```
<details>
<summary>Ejemplos</summary>

``` json
{
    "comentario": "Voy a ser sincero, no me atraen los dramas, o más bien... no sabía encontrarles lo atractivo. Cherry me cambió la perspectiva.",
    "id_pelicula_fk": 39
}
```

``` json
{
    "comentario": "Excelente la película. Me encanta de la película que se siente en todo momento que hubo presupuesto jeje. Películas así además de la temática son muy necesarias para el cine argentino, porque habla del potencial de nuestro cine.",
    "id_pelicula_fk": 25
}
```

``` json
{
    "comentario": "Excelente la película. Me encanta de la película que se siente en todo momento que hubo presupuesto jeje. Películas así además de la temática son muy necesarias para el cine argentino, porque habla del potencial de nuestro cine.",
    "id_pelicula_fk": 25
}
```
</details>
 
 <a name="putReviews"></a>
 
## Metodo PUT comentarios

> Metodo para editar a traves de una id a un comentario especificado por URL
```
http://localhost/WEB2/TpEspecial-API/api/comentarios/:ID
```
<details>
<summary>Ejemplos</summary>

``` json
{
    "comentario": "Me encantó la película, si te dejas llevar por la trama es maravilloso, está película es una muy buena. Buenos actores y directores",
    "id_pelicula_fk": 39
}
```

``` json
{
    "comentario": "Muy mala",
    "id_pelicula_fk": 24 
}
```
</details>
