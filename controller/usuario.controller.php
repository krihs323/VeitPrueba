<?php
require_once 'model/usuario.php';
require_once 'model/proyecto.php';


class UsuarioController{
    
    private $model;
	private $modelProyecto;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->modelProyecto = new Proyecto();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/footer.php';
    } 
	/**
	* Funcion que maneja los especialistas del proyecto, se maneja en esta clase por que se derivan de los mismos
	* usuarios
	*/
	public function IndexEspecialistas(){
		$esp = new Usuario();
		$proyecto = new Proyecto();
		$get_id_proyecto = $_REQUEST['id'];
        if(isset($_REQUEST['id'])){
            $esp = $this->model->ListarEspecialistasProyectos($_REQUEST['id']);
			//Datos de la Comundiad para mostrar el nombre en el mapa de links
			$proyecto = $this->modelProyecto->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/usuario/especialista.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $pro = new Usuario();
        
        if(isset($_REQUEST['id'])){
            $pro = $this->model->Obtener($_REQUEST['id']);
        }
		
		require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $pro = new Usuario();
        
        $pro->id = $_REQUEST['id'];
        $pro->temas_id = $_REQUEST['temas_id'];
        $pro->usuarios_id = $_REQUEST['usuarios_id'];
        $pro->titulo = $_REQUEST['titulo'];
        $pro->descripcion = $_REQUEST['descripcion'];

        $pro->id > 0 
            ? $this->model->Actualizar($pro)
            : $this->model->Registrar($pro);
        
        header('Location: index.php?c=Usuario&a=Index');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Usuario&a=Index');
    }
}