<?php
class Connect
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "mydb";
    private $chartset = "utf-8";
    private $conector;


    function connectBD()
    {
        $this->conector=new mysqli($this->server,$this->user,$this->password,$this->database);
        mysqli_query($this->conector,'SET NAMES "'.$this->chartset.'"');

        $response = "Conexiòn Exitosa";
        if($this->conector->connect_error)
        {
            $response = $this->conector->connect_error;
        }
        echo $response;
        return $this->conector;

    }
    
}

?>