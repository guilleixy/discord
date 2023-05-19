<?php
	include 'class_user.php'; 
	
	$email = $_POST['email'];
	
	$username = $_POST['username'];

	$password = $_POST['password'];
	
	/*  aqui comprobacion mayor de edad?*/

	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	$birth_date = date("$year-$month-$day");

	if(isset($_POST['mailing_list']) && $_POST['mailing_list'] == 'on'){
		$mailing_list = 1;		
	}
	
	else{
		$mailing_list = 0;
	}

	echo $mailing_list;

	$usuario_nuevo = new user($email, $username, $birth_date, $mailing_list);

	$usuario_nuevo->set_password($password);

	include 'conex_bbdd.php';

	$contra = $usuario_nuevo->leer_password();
	
	$random_num = rand(1, 8);

	$profilepicture = './default_pp/'.$random_num.'.png';

	$user_code = rand(1000,9999);

	/* tiene que comprobar que no se haya usado ya ese email/nombre de usuario */

	$sql = "INSERT INTO usuarios (email,username,password,birth_date,mailing_list, profile_picture, user_code, activity)  VALUES ('$usuario_nuevo->email','$usuario_nuevo->username','$contra','$usuario_nuevo->birth_date','$usuario_nuevo->mailing_list','$profilepicture','$user_code', '1')";
	$resultado = $conexion->query($sql);
	
	$sql = "SELECT user_id FROM usuarios WHERE email like '$usuario_nuevo->email' AND password like '$contra'";

	$resultado = $conexion->query($sql);

	if ($resultado->num_rows > 0) {
		while($fila = $resultado->fetch_assoc()) {
			$user_id = $fila['user_id'];
		}
		$conexion->close();
		header("Location:usuario_inicio.php?user_id=$user_id");
		exit;
	} else {
		echo "error";
		$conexion->close(); // no eficiente
	}


?>
	