<?php
    include("db.php");
    $id = $_GET['id'];

    $sql="SELECT * FROM usuarios WHERE id = $id";
    $resultado=mysqli_query($conn,$sql);

    $fila=mysqli_fetch_assoc($resultado);

    $nombre=$fila['nombre'];
    $apellido=$fila['apellido'];
    $email=$fila['email'];
    $password=$fila['pass'];
    $img=$fila['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="rou pl-5">
            <div class="col bg-dark text-light">
                <h1>CRUD Usuarios</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col">

        </div>
        <div class="col">
            <form>
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                        <label for="nombre" class="form-label">Nombre (s):</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $nombre?>">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido (s):</label>
                        <input type="text" class="form-control" id="lastname" value="<?php echo $apellido?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $email?>">
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password"value="<?php echo $password?>">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imágen:</label>
                        <input type="file" class="form-control" name="image" id="image" value="<?php echo $img?>" >
                    </div>
                    <button type="button" class="btn btn-outline-danger" id="insert">Agregar</button>
                </form>
        </div>
        <div class="col">

        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>