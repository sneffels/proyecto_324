<?php
	require ("./env.php");
	session_start();
	mysql_connect($host,$user,$pwd);
	mysql_select_db($bd);
	$sw=1;
	$flujo_sgt="";
	$formulario="";
	if (isset($_GET['flujo'])) {
		$_SESSION["flujo"]=$_GET['flujo'];
		$_SESSION["proceso"]=$_GET['proceso'];
	}
	if (isset($_GET['user']) && isset($_GET['password'])) {
		$user=$_GET['user'];
		$pwd=$_GET['password'];
		$sql="select * from usuario where iduser='$user' and pwd='$pwd'";
		$consulta=mysql_query($sql);
    	$ver=mysql_num_rows($consulta);
    	if ($ver!=0) {
			$sw=0;
			$flu=$_SESSION['flujo'];
			$pro=$_SESSION['proceso'];
			$sql="select * from flujo where flujo='$flu' and proceso='$pro'";
			$consulta=mysql_query($sql);
			$datos=mysql_fetch_array($consulta);
			$flujo_sgt=$datos['proceso_sgt'];
			$sql="select * from flujo where flujo='$flu' and proceso='$flujo_sgt'";
			$consulta=mysql_query($sql);
			$datos=mysql_fetch_array($consulta);
			$formulario=$datos['formulario'];

    	}else{
    		echo "datos incorrectos";
    	}
	}


?>	   

<html>
	<head>
		<style>
			input{
				border: 2px solid cadetblue;
				border-radius: 4px;
			}
			h2{
				font-family: "Calibri";
			}
			body{
				font-family: "Calibri";
			}

		</style>
	</head>
	<body>
		<div align="center">
			<h2>Login</h2>
			
			<form action="index.php" method="get">
				Usuario:<br>
				<input type="text" name="user">
				<br>
				Contraseña:<br>
				<input type="password" name="password">
				<br><br>
				<input type="submit" value="Ingresar" name="login">
			</form>

		</div>
		<center>
		<?php 
			if ($sw==0) {
				echo "<a href=".$formulario."?flujo=".$_SESSION['flujo']."&proceso=".$flujo_sgt."&user=".$user.">inscripcion</a>";
			}
		?>
		</center>
	</body>
</html>
