<?php
    include('db.php');

    $sql = "select id,nombre,apellido,email,pass,image from usuarios";
    $resultado = mysqli_query($conn,$sql);

    $data = array();
    
    while($fila=mysqli_fetch_assoc($resultado)){
        $data[] = $fila;
    }


    echo json_encode($data);
?>