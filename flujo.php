<?php
require ("./env.php");
$flujo = $_GET['flujo'];
$proceso = $_GET['proceso'];

mysql_connect($host,$user,$pwd);
mysql_select_db($bd);

$sql = "select * from flujo where proceso='".$proceso."' and flujo='".$flujo."'";
$resultado = mysql_query($sql);
$datos =  mysql_fetch_array($resultado);

?>
<html>
	<head>
		<style type="text/css">
		iframe{

			width: 400px;
			height: 400px;
		}
		</style>

	</head>
	<body>
		<center>
		<h1>Sistema Academico</h1>
		<iframe src="<?php echo $datos["formulario"];?>"></iframe>
		<br>
		<a href="flujo.php?flujo=<?php echo $datos['flujo']?>&proceso=<?php echo $datos['proceso_sgt']?>">Siguiente</a>
		</center>
		<!--<form action="flujo.php" method="get">
			<input type="submit" value="siguiente" name="siguiente">
		</form>
		-->
	</body>
</html>