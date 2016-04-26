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

        <input type="text" id="recibir" value="hola asdsadsa" />
        <button onclick="mostrar()">ver</button>      
        <!--aca recibe los datos en nuestro caso si verifica todo correcto un link-->  
        <div id="resultado"></div>
        
        
</div>
</body>
<script type="text/javascript" src="/jquery-2.1.1.min.js"></script>

<script>
 function mostrar(){
                var parametro = 'datos';

                 $.ajax({
                    type: 'GET',
                    url: 'enviar2.php?valor='+document.getElementById('recibir').value,
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