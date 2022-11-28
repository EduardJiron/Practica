
<?php


include_once('conexion.php');

class DtArqueoCajaDet extends conexion
{

    private $myCon;

    public function listArqueoCajaDet()
    {
            try{

                    $this->myCon= parent ::conectar();
                    $result= array();
                    $querysql= "SELECT * FROM tbl_arqueocaja_det";

                    $stm= $this->myCon->prepare($querysql);
                    $stm->execute();

                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                    {
                        $arq= new ArqueoCajaDet(); 
                     
                        $arq ->__SET('cantidad', $r->cantidad);

                      

                    


                            $result[]=$arq;
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