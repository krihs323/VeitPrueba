<?php
require_once 'model/comunidad.php';
require_once 'model/etnia.php';

class ComunidadController{
    
    private $model;
	private $modelEtnia;
    
    public function __CONSTRUCT(){
        $this->model = new Comunidad();
		$this->modelEtnia = new Etnia();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/comunidad/comunidad.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $com = new Comunidad();
        
        if(isset($_REQUEST['id'])){
            $com = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/comunidad/comunidad-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $com = new Comunidad();
        
        $com->id = $_REQUEST['id'];
        $com->comunidad = $_REQUEST['comunidad'];
        $com->descripcion = $_REQUEST['descripcion'];
        $com->poblacion = $_REQUEST['poblacion'];
        $com->etnias_id = $_REQUEST['etnias_id'];

        $com->id > 0 
            ? $this->model->Actualizar($com)
            : $this->model->Registrar($com);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}