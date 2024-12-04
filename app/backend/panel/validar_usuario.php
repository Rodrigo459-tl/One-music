<?php
require_once(__DIR__ . "/../../models/tabla_usuario.php");

session_start();
echo 'validando infromacion... <br>';
$message = '';
$type = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Analizando datos...<br>";
    // $_POST['variableinterfaz']   |   $_GET["variableinterfaz"]
    //echo $_POST["email"];
    //echo $_POST["password"];


    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        //instancia del modelo
        $tabla_usuario = new Tabla_usuarios();
        //ejeucuta la peticion
        $data = $tabla_usuario->validar_usuario($email, $pass);

        if (!empty($data)) {
            $_SESSION["is_logged"] = true;
            $_SESSION["name"] = $data->nombre_usuario . ' ' . $data->ap_usuario . ' ' . $data->am_usuario;
            $_SESSION['email'] = $data->correo_usuario;
            $_SESSION['nickname'] = $data->nombre_usuario;
            $_SESSION['img'] = (is_null($data->imagen_usuario)) ? (($data->sexo_usuario == 0) ?  'female.png' : 'male.png') : $data->sexo_usuario;
            
            header("location: ../../Views/panel/dashboard.php");
        } else {
            //limpiar las variables de sesion
            session_unset();
            //destruye la variable de sesion
            session_destroy();
            $type = 'danger';
            $message = "correo electronico o contraseña incorrectas";
            header("location: ../../../index.php?error=" . $message.'&type='.$type);
        }
    } else {
        $type = 'warning';
        $message = 'las credenciales de acceso son requeridas.';
        header('location: ../../../index.php?error=' . $message.'&type='.$type);
    }
} else {
    $type = 'warning';
    $message = 'error al procesar los datos.';
    header('location: ../../../index.php?error=' . $message.'&type='.$type);
}