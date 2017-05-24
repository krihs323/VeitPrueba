<?php
require_once 'model/proyecto.php';
require_once 'model/usuario.php';
require_once 'model/tema.php';

class ProyectoController{
    
    private $model;
	private $modelUsuario;
	private $modelTema;
    
    public function __CONSTRUCT(){
        $this->model = new Proyecto();
		$this->modelUsuario = new Usuario();
		$this->modelTema = new Tema();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/proyecto/proyecto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $pro = new Proyecto();
        
        if(isset($_REQUEST['id'])){
            $pro = $this->model->Obtener($_REQUEST['id']);
        }
		
		require_once 'view/header.php';
        require_once 'view/proyecto/proyecto-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $pro = new Proyecto();
        
        $pro->id = $_REQUEST['id'];
        $pro->temas_id = $_REQUEST['temas_id'];
        $pro->usuarios_id = $_REQUEST['usuarios_id'];
        $pro->titulo = $_REQUEST['titulo'];
        $pro->descripcion = $_REQUEST['descripcion'];

        $pro->id > 0 
            ? $this->model->Actualizar($pro)
            : $this->model->Registrar($pro);
        
        header('Location: index.php?c=Proyecto&a=Index');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Proyecto&a=Index');
    }
}