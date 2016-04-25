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
			
			<?php echo $_GET['flujo'];?>
			<?php echo $_GET['proceso'];?>
			

			<label>Codigo</label>	<input type="text" name="user" value="<?php echo $_GET['user'];?>">
			<input type="submit" value="mandar" />
		</form> 
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