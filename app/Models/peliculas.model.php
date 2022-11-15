<?php

class peliculasModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', ''); 
    }

    public function getAll(){
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getPelicula($id){
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id = ?');
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function editar($nombre,$sinopsis,$fecha,$pais,$direccion,$id){
        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, sinopsis = ?, fecha = ?, pais = ?, direccion = ? WHERE id = ?');
        $query->execute([$nombre,$sinopsis,$fecha,$pais,$direccion,$id]);
    }

    public function crear($nombre, $sinopsis, $fecha, $pais, $direccion, $genero){
        $query = $this->db->prepare('INSERT INTO peliculas (nombre, sinopsis, fecha, pais, direccion, id_genero_fk) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $sinopsis, $fecha, $pais, $direccion, $genero]);
    }
    public function ultimoId(){
    $ultimoID = $this->db->lastInsertId();
    return $ultimoID;
    }

    public function getpeliculasConParametros($sort = null, $order = null, $filtro = null){
        if(($sort != null) && ($order != null)){
            $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $sort $order");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
             return $result;

            }else if(($sort != null) && ($filtro != null)){
                $query = $this->db->prepare("SELECT * FROM `peliculas` WHERE $sort LIKE '%$filtro%' ");
                $query->execute([]);
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
    }
}