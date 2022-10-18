
const btn_agregar = document.getElementById("insert");
const btn_borrar = document.getElementById("cuerpoTabla");

function leerDatos(){
    let template = "";
    const url = "read.php"
    fetch(url)
    .then(r => r.json())
    .then(data => {
        data.forEach(element => {
            const id = element.id;
            const nombre = element.nombre;
            const apellido = element.apellido;
            const email = element.email;
            const pass = element.pass;
            const image = element.image;

            template += `<tr>
            <td>${id}</td>
            <td>${nombre}</td>
            <td>${apellido}</td>
            <td>${email}</td>
            
            <td>${image}</td>
            <td class = "text center"><button onclick="location.href='actualizar.php?id=".$filas['id']."'" class = "btn btn-success" id = "editar" value="${id}">Editar</button><button class = "btn btn-danger" id = "borrar" value="${id}">Borrar</button></td>
            </tr>`

        });
        document.getElementById("cuerpoTabla").innerHTML = template;
    })


}

leerDatos();

btn_agregar.addEventListener("click",function(e){
    e.preventDefault();
    const url = "create.php";
    const data = new FormData();

    const nombre = document.getElementById("name").value;
    const apellido = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const pass = document.getElementById("password").value;
    const image = document.getElementById("image").value;

    if(nombre==''||apellido==''||email==''||pass==''){
        alert('No puedes dejar vacío el campo de Nombre, Apellido, Email ni Contraseña');
    }
    else{
    data.append("nombre",nombre);
    data.append("apellido",apellido);
    data.append("email",email);
    data.append("pass",pass);
    data.append("image",image)

    fetch(url,{method:'POST',body:data});
    leerDatos();
    }
})

btn_borrar.addEventListener("click",function(e){
    if(e.target.id == "borrar"){
    const id = e.target.value;
    const url = "delete.php";
    const data = new FormData();
    data.append('id',id);
    fetch(url,{method:'POST',body:data})
    leerDatos();

    }
},true)