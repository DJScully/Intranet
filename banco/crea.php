<?php
$conex1 = new mysqli("127.0.0.1", "root", "", "mysql"); // Abre una conexión
if ($conex1->connect_errno) { // Comprueba conexión
printf("Conexión fallida: %s\n", mysqli_connect_error());
exit();
}
$query = "CREATE  DATABASE  Banco";
if ( $conex1->query( $query)) { // Sí hay resultados
echo "Creada";
} else {
	printf("Conexión fallida: %s\n", mysqli_connect_error());
}
$conex1->close(); // cierra conexión
?>