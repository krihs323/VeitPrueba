<?php
class Usuario
{
	private $pdo;
    
    public $id;
    public $usuario;
   
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuarios ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarEspecialistasProyectos($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare(" SELECT
						  funsoproni.proyectos.titulo,
						  funsoproni.proyectos.descripcion,
						  funsoproni.proyectos.alcance,
						  funsoproni.proyectos.presupuesto,
						  funsoproni.proyectos.fecha_inicial,
						  funsoproni.proyectos.usuarios_id,
						  funsoproni.proyectos.temas_id,
						  funsoproni.proyectos.estado_final,
						  funsoproni.proyectos.evaluacion_final,
						  funsoproni.proyectos.estado,
						  funsoproni.proyectos.fecha_final,
						  funsoproni.usuarios.nombres,
						  funsoproni.usuarios.apellidos,
						  funsoproni.usuarios.telefono,
						  funsoproni.usuarios.num_documento,
						  funsoproni.usuarios.profesion,
						  concat(funsoproni.usuarios.nombres,' ',funsoproni.usuarios.apellidos) as nombres_apellidos
						FROM
						  funsoproni.proyectos
						  INNER JOIN funsoproni.proyectos_profesionales
							ON funsoproni.proyectos_profesionales.proyectos_id =
							funsoproni.proyectos.id
						  INNER JOIN funsoproni.usuarios ON funsoproni.usuarios.id =
							funsoproni.proyectos_profesionales.usuarios_id WHERE funsoproni.proyectos.id = ".$id." ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarComboProyecto()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare(" SELECT a.id, concat(a.nombres, ' ', a.apellidos) as nombre_apellido FROM usuarios a inner join cargos b on 
										a.cargos_id = b.id where b.tipo_rol = 2 and estado = 1"); //Estado 1 es Activo | 0 es Inactivo
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerUsuario($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}