

<?php

class Conexion
{
    // Atributos
    private $pdo;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;

    // Metodos
    public function conectar()
	{
        $serverName = 'localhost';
        $dbName = 'webk';
        $userName = 'root';
<<<<<<< HEAD

        $pwd = 'Temporal2022++';

=======
        $pwd = 'Temporal2022+';
>>>>>>> 3a6941898370df9dfbc603fcca6b11f2b3948d8e


		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "0";

            return $this->pdo; 		        
		}
		catch(PDOException $e)
		{
            //echo "-1";
			die($e->getMessage());
		}


    }

    public function desconectar()
    {
        try
		{
            $pdo = null;
            //echo "Se desconecto de HR exitosamente!";
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }

}
?>
