<?php

class reviewModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', '');
    }
    public function getAll(){
        $query = $this->db->prepare('SELECT * FROM reviews');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getComentario($id){
        $query = $this->db->prepare('SELECT * FROM reviews WHERE id = ?');
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function editar($comentario,$id_peli, $id){
        $query = $this->db->prepare('UPDATE reviews SET comentario = ?, id_pelicula_fk = ? WHERE id = ?');
        $query->execute([$comentario,$id_peli, $id]);
    }
    public function crear($comentario, $idPelicula){
        $query = $this->db->prepare('INSERT INTO reviews (comentario, id_pelicula_fk) VALUES (?,?)');
        $query->execute([$comentario,$idPelicula]);
    }

    public function ultimoId(){
        $ultimoID = $this->db->lastInsertId();
        return $ultimoID;
        }
}