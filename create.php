<?php include("includes/header.php");
    include('db.php'); ?>
    <title>Crear Usuario</title>
    
    <?php
    if (isset($_POST['enviar'])){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $img=$_POST['image'];

        $sql="insert into usuarios(nombre,apellido,email,pass,image)
        values ('".$nombre."','".$apellido."','".$email."','".$password."','".$img."')"; 
        $resultado=mysqli_query($conn,$sql);

        if ($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ingresados correctamente a la Base de Datos');
                    location.assign('index.php');
                    </script>";
        }
        else{
            echo "<script language='JavaScript'>
            alert('ERROR: Los datos NO fueron ingresados a la Base de Datos');
            location.assign('index.php');
            </script>";
        }
    mysqli_close($conn);
    }
    else{
     
    ?>

    <h1>Agregar Usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label> Nombre(s): </label><br>
        <input type="text" name="nombre"><br>
        <label> Apellido(s): </label><br>
        <input type="text" name="apellido"><br>
        <label> Email: </label><br>
        <input type="text" name="email"><br>
        <label> Contraseña: </label><br>
        <input type="password" name="pass"><br>
        <label> Imágen: </label><br>
        <input type="text" name="image"><br>
        <br><input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php"> -Inicio- </a>
    </form>
    <?php
    }
    ?>


    
<?php include("includes/footer.php") ?>