<?php

class ConexionBD
{
    private $user='postgres';
    private $passwd='603015';
    private $servidor='localhost';
    private $db= 'blog';
    private $port = 5432;
    private $cnx;


    function __construct() {

        $this->cnx= pg_connect("
        dbname=".$this->db." port=".$this->port."
        password=".$this->passwd."
        user=".$this->user." " ) or die("ERROR DE CONEXION" . pg_last_error());
        return $this->cnx;
    }



    public function query($query){
	
        $result = pg_query($query) or die("Consulta errónea: ".pg_last_error());
    
    
    return $result;
    
    
    
         

}

}
$conexion= new ConexionBD();


$sql="SELECT
table_schema || '.' || table_name as show_tables
FROM
information_schema.tables
WHERE
table_type = 'BASE TABLE'
AND
table_schema NOT IN ('pg_catalog', 'information_schema');";


$result=$conexion->query($sql);
$datos=pg_fetch_array($result);
var_dump($datos);
?>