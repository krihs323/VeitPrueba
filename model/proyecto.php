<?php
class Proyecto
{
	private $pdo;
    
    public $id;
    public $temas_id;
    public $usuarios_id;
    public $titulo;
    public $descripcion;

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

			$stm = $this->pdo->prepare("SELECT
										  funsoproni.proyectos.id,
										  funsoproni.proyectos.titulo,
										  funsoproni.proyectos.descripcion,
										  funsoproni.proyectos.alcance,
										  funsoproni.proyectos.presupuesto,
										  funsoproni.proyectos.fecha_inicial,
										  funsoproni.proyectos.fecha_final,
										  funsoproni.proyectos.estado,
										  funsoproni.proyectos.evaluacion_final,
										  funsoproni.proyectos.estado_final,
										  funsoproni.proyectos.temas_id,
										  funsoproni.proyectos.usuarios_id,
										  funsoproni.usuarios.nombres,
										  funsoproni.usuarios.apellidos,
										  funsoproni.usuarios.telefono,
										  funsoproni.usuarios.num_documento,
										  funsoproni.temas.tema,
										  concat (funsoproni.usuarios.nombres, ' ', funsoproni.usuarios.apellidos) AS responsable
										FROM
										  funsoproni.proyectos
										  INNER JOIN funsoproni.temas ON funsoproni.proyectos.temas_id =
											funsoproni.temas.id
										  INNER JOIN funsoproni.usuarios ON funsoproni.proyectos.usuarios_id =
											funsoproni.usuarios.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM proyectos WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM proyectos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE proyectos SET 
						temas_id      = ?, 
						usuarios_id   = ?,
                        titulo        = ?,
						descripcion   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->temas_id, 
                        $data->usuarios_id,
                        $data->titulo,
                        $data->descripcion,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Proyecto $data)
	{
		try 
		{
		$sql = "INSERT INTO proyectos (temas_id,usuarios_id,titulo,descripcion) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->temas_id,
                    $data->usuarios_id, 
                    $data->titulo, 
                    $data->descripcion
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}