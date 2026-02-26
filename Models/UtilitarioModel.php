<?php
function OpenDatabase()
{
    return mysqli_connect("127.0.0.1","root","","caso1");
}

function CloseDatabase($conexion)
{
    mysqli_close($conexion);
}
?>
