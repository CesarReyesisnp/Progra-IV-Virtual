<?php
    include('../Config/Config.php');
    extract($_REQUEST);
    $estudiante = isset($estudiante) ? $estudiante : '[]';
    $accion = isset($accion) ? $accion : '';

    $objEstudiante = new Estudiante($conexion);
    if($accion=='consultar'){
        print_r( json_encode($objEstudiante->obtener_datos()) );
    }else if($accion=='eliminar'){
        print_r( json_encode($objEstudiante->eliminar_datos()) );
    }else{
        print_r( $objEstudiante->recibir_datos($estudiante) );
    }
    
    class Estudiante{
        private $datos=[], $db;
        public $resp = ['msg'=>'OK'];

        public function __construct($db){
            $this->db=$db;
        }
        public function obtener_datos(){
            $this->db->consultas('SELECT * FROM estudiantes');
            return $this->db->obtener_datos();
        }
        public function eliminar_datos(){
            global $idEstudiante;
            return $this->db->consultas('
                DELETE estudiantes FROM estudiantes
                WHERE idEstudiante=?', $idEstudiante
            );
        }
        public function recibir_datos($estudiante){
            $this->datos = json_decode($estudiante, true);
            return $this->validar_datos();
        }
        private function validar_datos(){
            if( empty($this->datos['NOMBRE']) ){
                $this->resp['msg'] = 'Por favor ingrese un NOMBRE';
            } 
            if( empty($this->datos['APELLIDO']) ){
                $this->resp['msg'] = 'Por favor ingrese un APELLIDO';
            }
            if( empty($this->datos['CARNET']) ){
                $this->resp['msg'] = 'Por favor ingrese numero de CARNET';
            }
           
            return $this->administrar_estudiante();
        }
        private function administrar_estudiante(){
            global $accion;
            if( $this->resp['msg']=='OK' ){
                if( $accion=='nuevo' ){
                    return $this->db->consultas('
                        INSERT INTO estudiantes (NOMBRE, APELLIDO, CARNET
                        VALUES(?,?,?)',$this->datos['NOMBRE'], $this->datos['APELLIDO'],
                        $this->datos['CARNET']
                    );
                }else if( $accion=='modificar' ){
                    return $this->db->consultas('
                        UPDATE estudiantes SET NOMBRE=?, APELLIDO=?, CARNET=?
                        WHERE idEstudiante=?', $this->datos['NOMBRE'], $this->datos['APELLIDO'],
                        $this->datos['CARNET'], $this->datos['idEstudiante']
                    );
                }else if( $accion=='eliminar'){
                    return $this->db->consultas('
                        DELETE estudiantes FROM estudiantes
                        WHERE idEstudiante=?', $this->datos['idEstudiante']
                    );
                }
            }else{
                return $this->resp;
            }

        }
    }
?>