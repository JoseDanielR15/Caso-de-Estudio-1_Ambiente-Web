<?php
include_once("UtilitarioModel.php");

function RegistrarEjercicioModel($Identificacion, $Fecha, $Monto, $TipoEjercicio)
{
    $conexion = OpenDatabase();

    $stmt = $conexion->prepare("CALL sp_RegistrarEjercicio(?,?,?,?)");
    $stmt->bind_param("ssdi", $Identificacion, $Fecha, $Monto, $TipoEjercicio);
    $stmt->execute();

    CloseDatabase($conexion);
}

function ConsultarEjerciciosModel()
{
    $conexion = OpenDatabase();

    $resultado = $conexion->query("CALL sp_ConsultarEjercicios()");

    CloseDatabase($conexion);

    return $resultado;
}

function ContarTiposPersonaModel($Identificacion)
{
    $conexion = OpenDatabase();

    $stmt = $conexion->prepare("CALL sp_ContarTiposPorPersona(?)");
    $stmt->bind_param("s", $Identificacion);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();

    CloseDatabase($conexion);

    return $fila["Cantidad"];
}
?>
