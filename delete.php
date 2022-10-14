<?php
    
    $id=$_GET['id'];
    
    include("db.php");
    
      
    $sql="select * from usuarios where id='".$id."'";
        $resultado=mysqli_query($conn,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $nombre=$fila['nombre'];
        $apellido=$fila['apellido'];
        $email=$fila['email'];
        $password=$fila['pass'];
        $img=$fila['image'];

     
    

    if($resultado){
        $sql="delete from usuarios where id='".$id."'";
        $res=mysqli_query($conn,$sql);
        unlink($img);
        echo "<script language='JavaScript'>
                    alert('Los datos se eliminaron correctamente de la Base de Datos');
                    location.assign('index.php');
                    </script>";
    }
    else{
        echo $image."<script language='JavaScript'>
                    alert('Los datos NO se eliminaron de la Base de Datos');
                    location.assign('index.php');
                    </script>";
    }
?>