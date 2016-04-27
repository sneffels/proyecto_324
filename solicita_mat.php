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
        <?php 
            require ("./env.php");
            mysql_connect($host,$user,$pwd);
            mysql_select_db($bd);            
            $sql="select * from materia";
            $resultado=mysql_query($sql);
           
            echo "<table border='1'>";  
            echo "<tr><td>materia</td><td>anadir materia</td><tr>";
            $i=1;
            while($row=mysql_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>".$row['nombre']."</td><td><div id='resultado".$i."'>sads</div></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        ?>
        <button onclick="mostrar()">verificar</button>        
        
   
</div>
</body>
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>

<script>

    function mostrar() {
            var parametro="a";
            var ruta="enviar2.php";
            for (var i = 1; i <=3; i++) {
             $.ajax({
                    type: 'GET',
                    url: ruta,
                    data: parametro,
                    beforeSend: function () {
                        //alert(ruta);
                        $("#resultado"+i).html("esperando...");
                    },
                    error: function() {
                        $("#resultado"+i).html("error...");
                    },
                    success: function( data ) {                    
                        $('#resultado'+i).html( data );
                    }
            });
        };
    }
</script>
</html>