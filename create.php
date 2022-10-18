<?php 
    
    include('db.php');

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $password=sha1($_POST['pass']);
        $img=$_FILES['image'];
        $img=$_FILES['image'];
        $imgNom = $img["name"];
        $tipo= $img["type"];
        $ruta = $img["tmp_name"];
        $carpeta = "fotos/";

        
        $sql="insert into usuarios(nombre,apellido,email,pass,image)
        values ('".$nombre."','".$apellido."','".$email."','".$password."','".$imagen."')";
        mysqli_query($conn,$sql);
        
        ?>