<?php
session_start();
$conn=mysqli_connect('localhost','root','6156721','Academico');

    $user=$_GET["user"];
    $pwd=$_GET["password"];

    $query="SELECT users.iduser,rol.description, rol.idrol  from users,rol where users.iduser='$user' and pwd='$pwd' and rol.idrol=users.idrol;";

    $result1 = mysqli_query($conn,$query);
    $totalRows=mysqli_num_rows($result1);
    $user=mysqli_fetch_array($result1);
    echo "<h1>";
    echo "Estas logeado como:".$user['iduser'];
    echo "</h1>";
    echo "(".$user['description'].")";
    //pregunta si el usuario actual ha iniciado algun proceso o no
    if(!$process=mysqli_query($conn,"select * from transactions where iduser='$user'"))
    {
        //obtiene los procesos de este usuario
        $processQuery=mysqli_query($conn,
            "select p.idprocess,p.description,p.type, p.form, p.idfollowingprocess,t.state from transactions t,process p where t.iduser='$user' and t.idprocess=p.idProcess");
        while($row=mysqli_fetch_array($processQuery))
        {
            echo $row['description']." ".$row['state'];
        }
    }
    else
    {
        //pregunta si este usuario puede iniciar el flujo
        
        $idrol=$user['idrol'];
        $processStart=mysqli_query($conn,"select from process where idrol='$idrol' and idprocess=1");
        if(!$processStart)
            echo "<br><a href='start.php'>Solicitar inscripcion</a>";
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



</body>
</html>
