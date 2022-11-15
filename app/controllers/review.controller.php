<?php
require_once './app/Models/review.model.php';
require_once './app/Models/peliculas.model.php';
require_once './app/views/peliculas.view.php';


class reviewController{
    private $reviewModel;
    private $pelisModel;
    private $view;

    private $data;

    public function __construct(){
        $this->reviewModel = new reviewModel();
        $this->pelisModel = new peliculasModel();
        $this->view = new peliculasView();

        $this->data = file_get_contents("php://input");
    }
    public function getData(){
        return json_decode($this->data);
    }

    public function getComentarios(){
        $comentarios = $this->reviewModel->getAll();
        if($comentarios){
            $comentarios = $this->asignarComentario($comentarios);
            $this->view->response($comentarios);
        }else{
            $this->view->response("$comentarios");
        }
    }
    public function getComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->reviewModel->getComentario($id);
        if($comentario){
            $pelis = $this->pelisModel->getAll();
            foreach ($pelis as $elem ) {
                if($comentario->id_pelicula_fk == $elem->id){
                    $comentario->pelicula = $elem->nombre;
                }
            }
            $this->view->response($comentario);
        }else{
            $this->view->response("No se encontro el comentario", 404);
        }
    }
    public function editarComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->reviewModel->getComentario($id);
        $data = $this->getData();
        if($comentario){
            if(!empty($data->comentario) && (!empty($data->id_pelicula_fk))){
                $comentario = $data->comentario;
                $id_peli = $data->id_pelicula_fk;

                $this->reviewModel->editar($comentario,$id_peli,$id);
                $this->view->response($comentario);
                
            }else{
                $this->view->response("Faltan completar campos", 400);
            }
        }else{
            $this->View->response("No existe el comentario", 404);
        }
    }
    public function addComentario(){
        $data = $this->getData();
        if(!empty($data->comentario)&&(!empty($data->id_pelicula_fk))){
            $comentario = $data->comentario;
            $id_peli = $data->id_pelicula_fk;

            $this->reviewModel->crear($comentario,$id_peli);
            $id = $this->reviewModel->ultimoId();
            $newComentario = $this->reviewModel->getComentario($id);
            $this->view->response($newComentario);
        }else{
            $this->view->response("complete los datos", 400);
        }
    }
    public function asignarComentario($comentarios){
        $pelis = $this->pelisModel->getAll();
        for($i = 0; $i < count($pelis); $i++){
            foreach ($comentarios as $elem ) {
                if($elem->id_pelicula_fk == $pelis[$i]->id){
                    $elem->pelicula = $pelis[$i]->nombre;
                }
            }
        }
        return $comentarios;

    }

}