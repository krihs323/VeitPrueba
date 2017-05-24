<?php
class Comunidad
{
	private $pdo;
    
    public $id;
    public $comunidad;
    public $descripcion;
    public $poblacion;
    public $etnias_id;

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

			$stm = $this->pdo->prepare("SELECT a.id, a.comunidad, a.descripcion, a.poblacion, a.etnias_id, b.etnia FROM comunidades a inner join etnias b on a.etnias_id = b.id");
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
			          ->prepare("SELECT * FROM comunidades WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM comunidades WHERE id = ?");			          

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
			$sql = "UPDATE comunidades SET 
						comunidad          = ?, 
						descripcion        = ?,
                        poblacion        = ?,
						etnias_id            = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->comunidad, 
                        $data->descripcion,
                        $data->poblacion,
                        $data->etnias_id,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Comunidad $data)
	{
		try 
		{
		$sql = "INSERT INTO comunidades (comunidad,descripcion,poblacion,etnias_id) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->comunidad,
                    $data->descripcion, 
                    $data->poblacion, 
                    $data->etnias_id
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}