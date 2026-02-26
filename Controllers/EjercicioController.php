<?php
include_once("../Models/EjercicioModel.php");

if(isset($_POST["btnRegistrar"]))
{
    $Identificacion = $_POST["Identificacion"];
    $Fecha = date("Y-m-d H:i:s");
    $Monto = $_POST["Monto"];
    $TipoEjercicio = $_POST["TipoEjercicio"];

    $cantidad = ContarTiposPersonaModel($Identificacion);

    if($cantidad >= 2)
    {
        header("Location: ../Views/vEjercicio/registro.php?error=limite");
        exit();
    }
    else
    {
        RegistrarEjercicioModel($Identificacion, $Fecha, $Monto, $TipoEjercicio);
        header("Location: ../Views/vEjercicio/consultar.php");
        exit();
    }
}
?>
