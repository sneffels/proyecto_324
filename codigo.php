<?php
	require ("./env.php");
	mysql_connect($host,$user,$pwd);
	mysql_select_db($bd);
	$usuario=$_GET['u'];
	$sql="select * from usuario where iduser='$usuario'";
	$resultado=mysql_query($sql);
	$row=mysql_num_rows($resultado);
	//pregunta 1
	if ($row>0) {
		echo "<a href='solicita_mat.php'>puede inscribirse</a>";
	}else{
		echo "el usuario no existe";
	}
?>