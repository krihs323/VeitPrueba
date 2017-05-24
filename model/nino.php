<?php
class Nino
{
	private $pdo;
    
    public $id;
    public $nombres;
	public $apellidos;
    public $comunidades_id;

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

			$stm = $this->pdo->prepare(" SELECT
										  funsoproni.ninos.id,
										  funsoproni.ninos.nombres,
										  funsoproni.ninos.apellidos,
										  funsoproni.ninos.num_documento,
										  funsoproni.ninos.fecha_nacimiento,
										  funsoproni.ninos.sexo,
										  funsoproni.ninos.direccion,
										  funsoproni.ninos.telefono,
										  funsoproni.ninos.comunidades_id,
										  funsoproni.comunidades.comunidad,
										  funsoproni.comunidades.descripcion
										FROM
										  funsoproni.ninos
										  INNER JOIN funsoproni.comunidades ON funsoproni.comunidades.id =
											funsoproni.ninos.comunidades_id ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarNinosComunidades($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare(" SELECT
										  funsoproni.ninos.id,
										  funsoproni.ninos.nombres,
										  funsoproni.ninos.apellidos,
										  funsoproni.ninos.num_documento,
										  funsoproni.ninos.fecha_nacimiento,
										  funsoproni.ninos.sexo,
										  funsoproni.ninos.direccion,
										  funsoproni.ninos.telefono,
										  funsoproni.ninos.comunidades_id,
										  funsoproni.comunidades.comunidad,
										  funsoproni.comunidades.descripcion
										FROM
										  funsoproni.ninos
										  INNER JOIN funsoproni.comunidades ON funsoproni.comunidades.id =
											funsoproni.ninos.comunidades_id WHERE funsoproni.comunidades.id = ".$id." ");
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
			          ->prepare("SELECT * FROM ninos WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM ninos WHERE id = ?");			          

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
			$sql = "UPDATE ninos SET 
						nombres          = ?, 
						apellidos        = ?,
						comunidades_id   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombres, 
                        $data->apellidos,
						$data->comunidades_id,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Nino $data)
	{
		try 
		{
		$sql = "INSERT INTO ninos (nombres,apellidos,comunidades_id) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombres,
					$data->apellidos,
                    $data->comunidades_id
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}