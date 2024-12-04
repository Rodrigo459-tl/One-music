<?php
require_once(__DIR__ . "/../config/Conecct.php"); //IMPORTAR LA CLASE CONEXION

class Tabla_usuarios
{
    private $connect;
    private $table = "usuarios";
    private $primary_key = "idUsuario";

    public function __construct()
    {
        $db = new Conecct();
        $this->connect = $db->conecct;
    }
    //---------------------------------------------
    //CONSULTAS ESPECIFICAS PARA GENERAR LOS QUERIES
    //QUERIES : PETICIONES SQL
    //CRUD : CREATE | READ | UPDATE | DELETE
    //---------------------------------------------



    //---------------------------------------------
    //QUERIES : PETICIONES  ESPECIFICAS  EN SQL
    //---------------------------------------------
    public function validar_usuario($email = '', $pass = '')
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE correo_usuario = :mail AND password_usuario = SHA2(:pass,0);';
        try {
            //preparar el query
            $stmt = $this->connect->prepare($sql);

            //bind asigna los parametros a la querie
            $stmt->bindValue(":mail", $email);
            $stmt->bindValue(":pass", $pass);

            //especificacion 
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();
            //retorna el 
            $user = $stmt->fetch();
            return (!empty($user)) ? $user : array();
        } catch (PDOException $e) {
            echo "error en la query: " . $e->getMessage();
            return array();
        }
    }
}