
<?php


include_once('conexion.php');

class DtUsuario extends conexion
{

    private $myCon;

    public function listUsuario()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_usuario";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                            $usu= new Usuario();
                            $usu->__SET('id_usuario', $r->id_usuario);
                            $usu->__SET('usuario', $r->usuario);
                            $usu->__SET('nombres', $r->nombres);
                            $usu->__SET('apellidos', $r->apellidos);
                            $usu->__SET('email', $r->email);
                            $usu->__SET('pwd', $r->pwd);

                            $result[]=$usu;
                    }
                    
                    $this->myCon= parent ::desconectar();
                    return $result;


            }

            catch(Exception $e)
            {
                die($e->getMessage());
            }
    }



}



?>
