<?php

require_once './app/Models/generos.model.php';
require_once './app/views/peliculas.view.php';

class generosController{
    private $generosModel;
    private $generosView;

    private $data;

    public function __construct(){
        $this->generosModel = new generosModel();
        $this->generosView = new peliculasView();
    
        $this->data = file_get_contents("php://input");
    }
    public function getData(){
        return json_decode($this->data);
    }
    public function getGeneros(){
        $generos = $this->generosModel->getAll();
        if($generos){
            $this->generosView->response($generos);
        }else{
            $this->generosView->response("error");
        }
    }

    public function getgenero($params = null){
        $id = $params[':ID'];

        $genero = $this->generosModel->getGenero($id);
        if($genero){
            $this->generosView->response($genero);
        }else{
            $this->generosView->response("no se encontro la peli", 404);
        }
    }
    public function editarGenero($params = null){
        $id = $params[':ID'];

        $genero = $this->generosModel->getGenero($id);
        $data = $this->getData();
        if($genero){
            if(!empty($data->genero)){
                $genero = $data->genero;
                $this->generosModel->editar($genero,$id);
                $this->generosView->response($genero);
            }else{
                $this->generosView->response("complete los campos",400 );
            }
        }else{
            $this->peliculasView->response("No existe el genero buscado", 404);
        }
    }

    public function addGenero(){
        $data = $this->getData();
    
        if(!empty($data->genero)){
            $genero = $data->genero;

            $this->generosModel->crear($genero);
            $id = $this->generosModel->ultimoId();
            $Genero = $this->generosModel->getGenero($id);
            $this->generosView->response($Genero);
        }else{
            $this->generosView->response("Complete los datos", 400);
        }
    }
}