<?php

$conexion = mysqli_connect('localhost','root','','prueba_backup');

$nombreArchivo = 'respaldoRefaccionaria.sql';

$abrir = fopen($nombreArchivo,"r+");
$contenido = fread($abrir,filesize($nombreArchivo));

$sql = explode(';', $contenido);
foreach ($sql as $query) {
  $result = mysqli_query($conexion,$query);
  if ($result) {
    echo '<tr><td><br></td></tr>';
    echo '<tr>td>'.$query.' <b>EXITO</b></td></tr>';
    echo '<tr><td><br></td></tr>';
  }
}

fclose($abrir);
echo "¡¡Exito al importar!!";

 ?>
