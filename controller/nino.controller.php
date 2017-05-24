<?php
require_once 'model/nino.php';
require_once 'model/comunidad.php';

class NinoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Nino();
		//Lo utilizo para mostrar el nombre en el mapa de links
		$this->modelComunidad = new Comunidad();
    }
    
    public function Index(){
		$nin = new Nino();
		$comunidad = new Comunidad();
		$get_id_comunidad = $_REQUEST['id'];

        if(isset($_REQUEST['id'])){
            $nin = $this->model->ListarNinosComunidades($_REQUEST['id']);
			//Datos de la Comundiad para mostrar el nombre en el mapa de links
			$comunidad = $this->modelComunidad->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/nino/nino.php';
        require_once 'view/footer.php';
    }
    
	
    public function Crud(){
        $nin = new Nino();
		$comunidad = new Comunidad();
		//Variable para el breadcrum, conservo este parametro, ya que vendo desde la comunidad y despues adminsitro sus niños
		$get_id_comunidad = $_REQUEST['comunidades_id'];
		
        if(isset($_REQUEST['id'])){
            $nin = $this->model->Obtener($_REQUEST['id']);
        }
		if(isset($get_id_comunidad)){
            $comunidad = $this->modelComunidad->Obtener($get_id_comunidad);
        }
        require_once 'view/header.php';
        require_once 'view/nino/nino-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $nin = new Nino();
        
        $nin->id = $_REQUEST['id'];
        $nin->nombres = $_REQUEST['nombres'];
        $nin->apellidos = $_REQUEST['apellidos'];
        $nin->comunidades_id = $_REQUEST['comunidades_id'];

        $nin->id > 0 
            ? $this->model->Actualizar($nin)
            : $this->model->Registrar($nin);
        
		//Redirecciono a la comunidad
        header('Location: ?c=Nino&a=Index&id='.$_REQUEST['comunidades_id']);
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
		
		
		
        header('Location: ?c=Nino&a=Index&id='.$_REQUEST['comunidades_id']);
    }
	
}