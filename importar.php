<?php

//$conexion = mysqli_connect('localhost','root','','prueba_backup');
$conexion = mysqli_connect('localhost','id7665311_admin','admin','id7665311_test	')

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

echo '<script language="javascript">';
echo 'alert("Exito al importar")';
echo '</script>';


echo '<script language="javascript">';
echo 'location.replace("menu.php");';
echo '</script>';

 ?>
