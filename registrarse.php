<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario =filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['contrasena'];
	$password2 = $_POST['contrasena2'];
    $seleccion = $_POST['seleccion'];
    
    $adminPass= $_POST['adminPass'];
    $adminUser= $_POST['adminUser'];
    
	$errores = '';
 
	if (empty($usuario) or empty($password) or empty($password2) or empty($adminPass) or empty($adminUser) ) {
		$errores .= '<li>Por favor rellena todos los campos</li>';
	}else{
		try{
			//$conexion = new PDO('mysql:host=localhost;dbname=id7665311_refaccionaria','id7665311_root','admin');
			$conexion = new PDO('mysql:host=localhost;dbname=refaccionaria','root','');
		}catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);
        $adminPass = hash('sha512', $adminPass);

		if($password != $password2){
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
        
        $tipo='ADMN';
        $res = $conexion->prepare('SELECT * FROM usuarios');
        $res->execute();
        $res = $res->fetchAll();
        $encontrado=false;
        foreach ($res as $elemento) {
          if(($elemento['usuario'] == $adminUser) and ($elemento['contrasena'] == $adminPass) and ($elemento['tipo_empleado'] == $tipo)){
              $encontrado=true;
          }
        }
        if($encontrado==false)
        {
            $errores .= '<li>Error de autenticacion de usuario que otorga el permiso</li>';
        }
	}
	if ($errores == '') {
        
		$statement = $conexion->prepare('INSERT INTO usuarios (id_usuario,usuario,contrasena,tipo_empleado) VALUES (null,:usuario,:password,:seleccion)');
		$statement->execute(array(':usuario'=> $usuario,':password'=> $password,':seleccion'=>$seleccion));

		header('Location: login.php');
	}
}

require 'views/registrarse.view.php';

?>
