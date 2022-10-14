<?php include("includes/header.php");
    include('db.php'); ?>
    <title>Crear Usuario</title>
    
    <?php
    if (isset($_POST['enviar'])){
        if (empty($_POST['nombre']) || empty($_POST['apellido'])||empty($_POST['email']) || empty($_POST['pass'])){
            echo "<script language='JavaScript'>
            alert('No puedes dejar vacío el campo de Nombre, Apellido, Email ni Contraseña');
            location.assign('create.php');
            </script>";
        }
        else{
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $password=sha1($_POST['pass']);
        $imagen='';
        $nuevo_email=mysqli_query($conn,"select email from usuarios where email='$email'");
        if(mysqli_num_rows($nuevo_email)>0)
        {echo "<script language='JavaScript'>
            alert('Error, el email ya está registrado, intenta con otro');
            location.assign('create.php');
            </script>";
        }
        else{
        if(isset($_FILES["image"])){
            $img=$_FILES['image'];
            $imgNom = $img["name"];
            $tipo= $img["type"];
            $ruta = $img["tmp_name"];
            $carpeta = "fotos/";
            if($tipo!='image/jpg'&&$tipo!='image/JPG'&&
            $tipo!='image/jpeg'&&$tipo!='image/png'
            &&$tipo!='image/gif'){
                echo "<script language='JavaScript'>
                alert('Error, el archivo no es una imágen');
                location.assign('create.php');
                </script>";
            }
            else{
                $src = $carpeta.$imgNom;
                move_uploaded_file($ruta,$src);
                $imagen="fotos/".$imgNom;
                $sql="insert into usuarios(nombre,apellido,email,pass,image)
        values ('".$nombre."','".$apellido."','".$email."','".$password."','".$imagen."')"; 
        $resultado=mysqli_query($conn,$sql);
            }
        }
        }
        

        

        if ($resultado){
            echo "<script language='JavaScript'>
                    alert('Los datos fueron ingresados correctamente a la Base de Datos');
                    location.assign('index.php');</script>";
        }
        else{
            echo "<script language='JavaScript'>
            alert('ERROR: Los datos NO fueron ingresados a la Base de Datos');
            location.assign('index.php');
            </script>";
        }
    }
    mysqli_close($conn);
    }
    else{
     
    ?>

    <h1>Agregar Usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <label> Nombre(s): </label><br>
        <input type="text" name="nombre"><br>
        <label> Apellido(s): </label><br>
        <input type="text" name="apellido"><br>
        <label> Email: </label><br>
        <input type="text" name="email"><br>
        <label> Contraseña: </label><br>
        <input type="password" name="pass"><br>
        <label> Imágen: </label><br>
        <input type="file" name="image" id="image">
        <br><input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php"> -Inicio- </a>
    </form>
    <?php
    }
    ?>


    
<?php include("includes/footer.php") ?>