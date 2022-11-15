<?php
require_once './app/Models/peliculas.model.php';
require_once './app/Models/generos.model.php';
require_once './app/views/peliculas.view.php';

class peliculasController{
    private $peliculasModel;
    private $peliculasView;
    private $generosModel;

    private $data;

    public function __construct(){
        $this->peliculasModel = new peliculasModel();
        $this->peliculasView = new peliculasView();
        $this->generosModel = new generosModel();

        $this->data = file_get_contents("php://input");
    }

    public function getData(){
        return json_decode($this->data);
    }

    public function getPeliculas($params = null){
        if (!isset($_GET['sort']) && !isset($_GET['order']) && !isset($_GET['filtro'])) {
            $peliculas = $this->peliculasModel->getAll();
        } else if (isset($_GET['sort']) && isset($_GET['order'])) {

            $order = strtoupper($_GET['order']);
            $sort = $_GET['sort'];

            $peliculas = $this->peliculasModel->getpeliculasConParametros($sort, $order);
        } else if (isset($_GET['sort']) && isset($_GET['filtro'])) {

            $sort = $_GET['sort'];
            $filtro = $_GET['filtro'];

            $peliculas = $this->peliculasModel->getpeliculasConParametros($sort, null, $filtro);
        } else {
            $this->peliculasView->response("el parametro enviado es incorrecto", 400);
        }

        if (!empty($peliculas)) {
            $this->asignarGenero($peliculas);
            $this->peliculasView->response($peliculas);
        }
    }

    public function getPelicula($params = null){
        $id = $params[':ID'];

        $pelicula = $this->peliculasModel->getPelicula($id);
        $generos = $this->generosModel->getAll();


        if ($pelicula) {
            foreach ($generos as $elem) {
                if ($elem->id == $pelicula->id_genero_fk) {
                    $pelicula->genero = $elem->genero;
                }
            }
            $this->peliculasView->response($pelicula);
        } else {
            $this->peliculasView->response("La pelicula seleccionada no existe", 404);
        }
    }
    public function editarPelicula($params = null){
        $id = $params[':ID'];

        $pelicula = $this->peliculasModel->getPelicula($id);
        $data = $this->getData();
        if ($pelicula) {
            if (!empty($data->nombre) && !empty($data->sinopsis) && !empty($data->fecha) && !empty($data->pais) && !empty($data->direccion)) {
                $nombre = $data->nombre;
                $sinopsis = $data->sinopsis;
                $fecha = $data->fecha;
                $pais = $data->pais;
                $direccion = $data->direccion;

                $this->peliculasModel->editar($nombre, $sinopsis, $fecha, $pais, $direccion, $id);
                $this->peliculasView->response($pelicula);
            } else {
                $this->peliculasView->response("faltan completar campos", 400);
            }
        } else {
            $this->peliculasView->response("No existe la pelicula", 404);
        }
    }

    public function addPelicula(){
        $data = $this->getData();
        try{
            if (!empty($data->nombre) && !empty($data->sinopsis) && !empty($data->fecha) && !empty($data->pais) && !empty($data->direccion) && !empty($data->id_genero_fk)) {
                $nombre = $data->nombre;
                $sinopsis = $data->sinopsis;
                $fecha = $data->fecha;
                $pais = $data->pais;
                $direccion = $data->direccion;
                $id_genero = $data->id_genero_fk;
    
                $this->peliculasModel->crear($nombre, $sinopsis, $fecha, $pais, $direccion, $id_genero);
                $id = $this->peliculasModel->ultimoId();
                $pelicula = $this->peliculasModel->getPelicula($id);
                $this->peliculasView->response($pelicula,201);
            } else {
                $this->peliculasView->response("complete los datos", 400);
            }
        }catch(Exception $e){
            $this->peliculasView->response("Datos erroneos", 400);
        }
    }

    public function asignarGenero($peliculas){
        $generos = $this->generosModel->getAll();
        for ($i = 0; $i < count($peliculas); $i++) {
            foreach ($generos as $elem) {
                if ($peliculas[$i]->id_genero_fk == $elem->id) {
                    $peliculas[$i]->genero = $elem->genero;
                }
            }
        }
        return $peliculas;
    }
}
