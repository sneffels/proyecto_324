<?php

session_start();

if(isset($_get['login']))
{
	$_SESSION["user"]=$_GET['user'];
	$_SESSION["pwd"]=$_GET['password'];
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
			<form action="home.php" method="get">
				Usuario:<br>
				<input type="text" name="user">
				<br>
				Contraseña:<br>
				<input type="password" name="password">
				<br><br>
				<input type="submit" value="Ingresar" name="login">
			</form>
		</div>
	</body>
</html>
