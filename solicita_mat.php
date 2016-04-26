
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

        <?php
        require ("./env.php");
        session_start();
        mysql_connect($host,$user,$pwd);
        mysql_select_db($bd);

        $flujo=$_GET['flujo'];
        $proceso=$_GET['proceso'];
        $usuario=$_GET['user'];
        
        $sqlmaterias="select * from materias";
        $materias=mysql_query($sqlmaterias);
        
        $sqlflujo="select * from flujo where flujo='$flujo' and proceso='$proceso'";
        $siguiente=mysql_query($sqlflujo);

        while ($materia=mysql_fetch_array($materias))
        {

            echo $materia['nombre'];
            echo '<input class="submit" type="button" value="adicionar" onclick="
            realizaProceso('.$usuario.','.$materia['nombre'].','.$siguiente['proceso_sgte'].','.$siguiente['flujo'].','.$siguiente['formulario'].')">';
        }
        ?>

        
        
        
        
    </form>
</div>
</body>
<script type="text/javascript" src="/js/jquery.js"></script>

<script>
    function realizaProceso(usuario, materia,proceso, flujo,formulario){
        var parametros = {
            "usuario" :usuario,
            "materia" : materia,
            "proceso" : proceso,
            "flujo"   : flujo
            
        };
        $.ajax({
            data:  parametros,
            url:   formulario,
            type:  'post',
            beforeSend: function () {
                $("#resultado").html("Verificando materia...");
            },
            success:  function (response) {
                $("#resultado").html(response);
            }
        });
    }
</script>