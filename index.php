<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>CRUD USUARIOS</title>
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
        <div class="row mt-5">
            <div class="col-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre (s):</label>
                        <input type="text" class="form-control" id="name" >
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido (s):</label>
                        <input type="text" class="form-control" id="lastname" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" >
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imágen:</label>
                        <input type="file" class="form-control" name="image" id="image" >
                    </div>
                    <button type="button" class="btn btn-outline-danger" id="insert">Agregar</button>
                </form>

            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr class="bg-danger text-black">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        
                        <th scope="col">Imágen</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id = "cuerpoTabla">


                    
                    </tbody>
                </table>
            </div>
        </div>  
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="funciones.js"></script>
</body>
</html>