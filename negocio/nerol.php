<?php

include_once("../entidades/Rol.php");
include_once("../datos/DtRol.php");

$us = new Rol();
$dtu = new DtRol();

if ($_POST) 
{
           /* try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('rol_descripcion', $_POST['descripcion']);
                $us->__SET('estado', 1);
                $dtu-> insertRol($us);
                //var_dump($emp);
                header("Location: ../tblRol.php?msj=1") ;
            } 
            catch (Exception $e) 
            {
                header("Location: kermese2/tblRol.php?msj=1");
                die($e->getMessage());
            } */

            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $us->__SET('id_rol', $_POST['id_rol']);
                //$us->__SET('usuario', $_POST['userHidden']);
                $us->__SET('rol_descripcion', $_POST['rol_descripcion']);
                $us->__SET('estado', 2);

        
                $dtu->editRol($us);
                //var_dump($emp);
                
            } 
            catch (Exception $e) 
            {
                header("Location: /HR/tbl_usuarios.php?msj=4");
                die($e->getMessage());
            }
    }





if ($_GET) 
{
    try 
    {
        
        $us->__SET('id_usuario', $_GET['delU']);
        $dtu->deleteUser($us->__GET('id_usuario'));
        header("Location: /HR/tbl_usuarios.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /HR/tbl_usuarios.php?msj=6");
        die($e->getMessage());
    }
}
