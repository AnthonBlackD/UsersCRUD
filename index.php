<?php include("db.php");
$sql="select*from usuarios";
$resultado=mysqli_query($conn,$sql);
?>

<?php include("includes/header.php") ?>
    <title>Usuarios</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estás Seguro?, se eliminaran los datos');
        }
    </script>
    <h1>Usuarios</h1>
    
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <th colspan="5"><h1>Lista Usuarios</h1></th>
            </tr>
            <tr>
                <td>
                    <label> Id: </label><br>
                    <input type="text" name="id"><br>
                </td>
                <td>
                    <label> Nombre(s): </label><br>
                    <input type="text" name="nombre"><br>
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="">Mostrar todos los usuarios</a>
                </td>
                <td>
                    <a href="create.php">Nuevo Usuario</a>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Imagen</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['enviar'])){
                $nombre= $_POST['nombre'];
                $id=$_POST['id'];

                if(empty($_POST['nombre']) && empty($_POST['id'])) {
                    echo "<script language='JavaScript'>
                    alert('Ingresa el Nombre o el Id');
                    location.assign('index.php');
                    </script>";
                }
                else{
                    if(empty($_POST['nombre'])){
                      $sql="select * from usuarios where id=".$id;
                    }
                    if(empty($_POST['id'])){
                        $sql="select * from usuarios where nombre like '%".$nombre."%'";
                    }
                    if(!empty($_POST['nombre'])&&!empty($_POST['id'])){
                        $sql="select * from usuarios where id =".$id." and nombre like '%".$nombre."%'";
                    }
                }
                $resultado=mysqli_query($conn,$sql);
                while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                 <tr>
                    <td><?php echo $filas['id']?></td>
                    <td><?php echo $filas['nombre']?></td>
                    <td><?php echo $filas['apellido']?></td>
                    <td><?php echo $filas['email']?></td>
                    <td><?php echo $filas['image']?></td>
                    <td><?php echo $filas['pass']?></td>
                    <td>
                        <?php echo "<a href='update.php?id=".$filas['id']."'>EDITAR</a>";?>
                        -
                        <?php echo "<a href='delete.php?id=".$filas['id']."' onclick='return confirmar()'>ELIMINAR</a>";?>
                    </td>
                </tr>
                <?php

          
            }
                
        }else{

            while($filas=mysqli_fetch_assoc($resultado)){
        ?>
                 <tr>
                    <td><?php echo $filas['id']?></td>
                    <td><?php echo $filas['nombre']?></td>
                    <td><?php echo $filas['apellido']?></td>
                    <td><?php echo $filas['email']?></td>
                    <td><?php echo $filas['image']?></td>
                    <td><?php echo $filas['pass']?></td>
                    <td>
                        <?php echo "<a href='update.php?id=".$filas['id']."'>EDITAR</a>";?>
                        -
                        <?php echo "<a href='delete.php?id=".$filas['id']."' onclick='return confirmar()'>ELIMINAR</a>";?>
                    </td>
                </tr>
        <?php
                }
            }
        ?>
        </tbody>
    </table>
     
    <?php mysqli_close($conn); ?>

<?php include("includes/footer.php") ?>