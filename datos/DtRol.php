<?php


include_once('conexion.php');

class DtRol extends conexion
{

        private $myCon;

        public function listRol()
        {
                try{

                        $this->myCon= parent ::conectar();
                        $result= array();
                        $querysql= "SELECT * FROM tbl_rol";

                        $stm= $this->myCon->prepare($querysql);
                        $stm->execute();

                        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                        {
                                $rol= new Rol();
                                $rol->__SET('id_rol', $r->id_rol);
                                $rol->__SET('rol_descripcion', $r->rol_descripcion);                            
                                $rol->__SET('estado', $r->estado);                            

                                $result[]=$rol;
                        }
                        
                        $this->myCon= parent ::desconectar();
                        return $result;


                }

                catch(Exception $e)
                {   
                die($e->getMessage());
                }
        }   

        public function insertRol(Rol $rol)
        {
                try
                {
                        $this->myCon= parent ::conectar();
                        $querysql= "INSERT INTO webk.tbl_rol (rol_descripcion, estado) VALUES (?,?)";

                        $stm= $this->myCon->prepare($querysql);
                        $stm->execute(array(
                                $rol->__GET('rol_descripcion'),
                                $rol->__GET('estado')
                        ));

                        $this->myCon= parent ::desconectar();
                }
                catch(Exception $e)
                {
                        die($e->getMessage());
                }
        }

        public function getRolrByID($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM webk.tbl_rol WHERE id_rol = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$u = new Rol();

			//_SET(CAMPOBD, atributoEntidad)			
			$u->__SET('id_rol', $r->id_rol);
                        $u->__SET('rol_descripcion', $r->rol_descripcion);
                        $u->__SET('estado', $r->estado);
                        

			$this->myCon = parent::desconectar();
			return $u;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

        public function editRol(Rol $tu)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE webk.tbl_rol SET
						rol_descripcion = ?,
						 estado= ?
						
				    WHERE id_rol = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					//$tu->__GET('usuario'), 
                                        
                                        $tu->__GET('rol_descripcion'),
                                        $tu->__GET('estado'),
                                        $tu->__GET('id_rol')


					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}


}



?>