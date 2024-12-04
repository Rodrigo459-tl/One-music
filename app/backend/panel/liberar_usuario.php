<?php
//iniciar la session
session_start();

//desasignar los valores de la variable de session
session_unset();
//destruir la variable de session de manera permanente
session_destroy();
//redireccionar al login
header("location: ../../../index.php");