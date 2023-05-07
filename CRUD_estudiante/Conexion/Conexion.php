<?php
class Conexion{
    private $conexion, $result, $preparar;

    public function __construct($server, $user, $clave){
        $this->conexion = new PDO($server, $user, $clave, 
            array(PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)) or die('No es posible conectar a la BD');
    }
    public function consultas($sql=''){
        try{
            $parametros = func_get_args();
            array_shift($parametros); 

            $this->preparar = $this->conexion->prepare($sql);
            $this->result = $this->preparar->execute($parametros);
            return $this->result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function obtener_datos(){
        return $this->preparar->fetchAll(PDO::FETCH_ASSOC);      
    }
}

?>