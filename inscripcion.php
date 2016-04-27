<?php 
	require ("./env.php");
	mysql_connect($host,$user,$pwd);
	mysql_select_db($bd);
	$flujo=$_GET['flujo'];
	$proceso=$_GET['proceso'];
	$sql="select * from flujo where flujo='$flujo' and proceso='$proceso'";
	$consulta=mysql_query($sql);
	$datos=mysql_fetch_array($consulta);
	$flujo_sgt=$datos['proceso_sgt'];
	$sql="select * from flujo where flujo='$flujo' and proceso='$flujo_sgt'";
	$consulta=mysql_query($sql);
	$datos=mysql_fetch_array($consulta);
	$formulario=$datos['formulario'];

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
		
			<h2>Inscripcion</h2>


			


			<label>Codigo</label>	<input type="text" id="user" value="<?php echo $_GET['user'];?>">
			<button id="btn" onclick="verificarcodigo()">mandar</button>
			sasad	
			<div id="resultado"></div>
		
		
	</div>
</body>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
 
<script>
		function verificarcodigo(){
			var parametro="a";
			var ruta="<?php echo $formulario;?>";
			//alert(ruta);
			 $.ajax({
                    type: 'GET',

                    url: ruta+'?u='+document.getElementById('user').value,
                    data: parametro,
                    beforeSend: function () {
                        $("#resultado").html("esperando...");
                    },
                    error: function() {
                        $("#resultado").html("error...");
                    },
                    success: function( data ) {                    
                        $('#resultado').html( data );
                    }
                 });

		}

</script>
</html>
