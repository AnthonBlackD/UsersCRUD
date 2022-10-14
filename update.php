<?php include("includes/header.php");
    include('db.php'); ?>
    <title>Editar Usuario</title>
    <?php
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $img=$_POST['image'];

        $sql="update usuarios set nombre='".$nombre."',
        apellido='".$apellido."',email='".$email."',
        pass='".$password."',image='".$img."'
        where id='".$id."'";
        $resultado=mysqli_query($conn,$sql);
        if($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos se actualizaron correctamente');
                    location.assign('index.php');
                    </script>";
        }
        else{
            echo "<script language='JavaScript'>
                    alert('Los datos NO se actualizaron');
                    location.assign('index.php');
                    </script>";
        }
        mysqli_close($conn);
    }
    else{
        $id=$_GET['id'];
        $sql="select * from usuarios where id='".$id."'";
        $resultado=mysqli_query($conn,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nombre=$fila['nombre'];
        $apellido=$fila['apellido'];
        $email=$fila['email'];
        $password=$fila['pass'];
        $img=$fila['image'];

        mysqli_close($conn);
    ?>
    <h1>Editar Usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label> Nombre(s): </label><br>
        <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>
        <label> Apellido(s): </label><br>
        <input type="text" name="apellido" value="<?php echo $apellido;?>"><br>
        <label> Email: </label><br>
        <input type="text" name="email" value="<?php echo $email;?>"><br>
        <label> Contraseña: </label><br>
        <input type="password" name="pass" value="<?php echo $password;?>"><br>
        <label> Imágen: </label><br>
        <input type="text" name="image" value="<?php echo $img;?>"><br>
        <br><input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php"> -Inicio- </a>
    </form>
<?php
    }
?>




<?php include("includes/footer.php") ?>