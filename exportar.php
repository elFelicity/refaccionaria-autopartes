<?php
$conexion = mysqli_connect('localhost','root','','refaccionaria');

$tablas = array();
$resultado = mysqli_query($conexion, "SHOW TABLES");
while ($row = mysqli_fetch_row($resultado)) {
  $tablas[] = $row[0];
}

$return = '';
foreach ($tablas as $table) {
  $resultado = mysqli_query($conexion, "SELECT * FROM ".$table);
  $num_campos = mysqli_num_fields($resultado);

  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($conexion,'SHOW CREATE TABLE '.$table));
  $return .= "\n\n".$row2[1].";\n\n";

  for ($i = 0; $i < $num_campos; $i++) {
    while ($row = mysqli_fetch_row($resultado)) {
      $return .= 'INSERT INTO '.$table.' VALUES(';
      for ($j=0; $j < $num_campos; $j++) {
        $row[$j] = addslashes($row[$j]);
        if (isset($row[$j])) {
          $return .= '"'.$row[$j].'"';
        } else {
          $return .= '""';
        }
        if ($j < $num_campos - 1) {
          $return .= ',';
        }
      }
      $return .= ");\n";
    }
  }
$return .= "\n\n\n";
}

$abrir = fopen('respaldoRefaccionaria.sql','w+');
fwrite($abrir, $return);
fclose($abrir);

//echo "¡¡Respaldo Exitoso!!";

echo '<script language="javascript">';
echo 'alert("Respaldo Exitoso")';
echo '</script>';

location.replace("menu.php");


 ?>
