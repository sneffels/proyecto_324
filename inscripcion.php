<>
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
		<form >
			<h2>Inscripcion</h2>


			<?php $_GET['user']='AG9102122';
			$_GET['materia']='INF161';
			?>


			<label>Codigo</label>	<input type="text" name="user" value="<?php echo $_GET['user'];?>">
			<input type="submit" value="mandar"  />
		</form> 
		
		<?php
		require ("./env.php");
		session_start();

		$conn=mysqli_connect($host,$user,$pwd,$bd);

		$materia=$_GET['materia'];
		$usuario=$_GET['user'];
		
		$sql="select * from materia where nombre ='$materia'";
		$query=mysqli_query($conn,$sql);
		$result=mysqli_fetch_array($query);
		
		$maxCupo=$result['maxcupo'];
		$cupoActual=$result['cupoactual'];

		echo $maxCupo." ".$cupoActual;
		
		if($cupoActual+1>$maxCupo)
			echo "No hay cupo";
		else
		{
			$nuevocupo=$cupoActual+1;
			echo $nuevocupo;
			$sql2="insert into materia_alumno('$usuario','$materia')";
			$sql3="update materia set cupoactual='$nuevocupo' where nombre='$materia'";
			mysqli_query($conn,$sql2);
			mysqli_query($conn,$sql3);


			echo "inscripcion realizada";
		}
		
		?>
	</div>
</body>
<script type="text/javascript" src="/js/jquery.js"></script>
 
<script>
		function realizaProceso(valorCaja1, valorCaja2){
        	var parametros = {
            	    "valorCaja1" : valorCaja1,
                	"valorCaja2" : valorCaja2
        };
        $.ajax({
                data:  parametros,
                url:   'ejemplo_ajax_proceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>