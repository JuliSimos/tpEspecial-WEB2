<?php
class generosModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', ''); 
    }

    public function getAll(){
        $query = $this->db->prepare('SELECT * FROM generos');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getGenero($id){
        $query = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function editar($genero, $id){
        $query = $this->db->prepare('UPDATE generos SET genero = ? WHERE id = ?');
        $query->execute([$genero, $id]);
    }
    public function crear($genero){
        $query = $this->db->prepare('INSERT INTO generos (genero) VALUES (?)');
        $query->execute([$genero]);
    }
    public function ultimoId(){
        $ultimoID = $this->db->lastInsertId();
        return $ultimoID;
        }

}