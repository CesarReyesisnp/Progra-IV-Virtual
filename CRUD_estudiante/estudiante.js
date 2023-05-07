var accion = 'nuevo',
    idEstudiante = 0;
document.addEventListener("DOMContentLoaded", e=>{
    frmEstudiante.addEventListener("submit", event=>{
        event.preventDefault();

        let estudiante = {
            idEstudiante,
            nombre: txtnombre.value,
            apellido: txtapellido.value,
            carnet: txtcarnet.value,
            
        };
        fetch(`procesar.php?accion=${accion}&estudiante=${JSON.stringify(estudiante)}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoEstudiante();
                obtenerDatosEstudiantes();
            }else{
                alert("Error al intentar guardar el estudiante");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    });
    obtenerDatosEstudiantes();
});
function eliminarEstudiante(estudiante){
    if( confirm(`Esta seguro de eliminar a ${estudiante.nombre}?`) ){
        fetch(`procesar.php?accion=eliminar&idEstudiante=${estudiante.idEstudiante}`)
        .then(resp=>resp.json())
        .then(data=>{
            if( data ){
                nuevoEstudiante();
                obtenerDatosEstudiantes();
            }else{
                alert("Error al intentar eliminar el estudiante");
                console.log( data );
            }
        }).catch(er=>{
            console.log( er );
        });
    }
}
function modificarEstudiante(estudiante){
    accion = 'modificar';
    idEstudiante = estudiante.idEstudiante;
    txtnombre.value = estudiante.nombre;
    txtapellido.value = estudiante.apellido;
    txtcarnet.value = estudiante.carnet;
}
function obtenerDatosEstudiante(){
    fetch('procesar.php?accion=consultar')
    .then(resp=>resp.json())
    .then(estudiante=>{
        let filas = '',
            $tblEstudiante = document.querySelector('#tblDEE$tblEstudiante > tbody');
        estudiante.forEach(estudiante=>{
            filas += `
                <tr onClick='modificarDocente(${JSON.stringify(estudiante)})'>
                    <td>${estudiante.nombre}</td>
                    <td>${estudiante.apellido}</td>
                    <td>${estudiante.carnet}</td>
                    <td>
                        <button class="btn btn-danger" onClick='eliminarEstudiante(${JSON.stringify(estudiante)})'>DEL</button>
                    </td>
                </tr>
            `;
        });
        $tblEstudiante.innerHTML = filas;
    })
    .catch(err=>{
        console.log(err);
    })
}
function nuevoEstudiante(){
    accion = 'nuevo';
    idEstudiante = 0;
    txtnombre.value = "";
    txtapellido.value = "";
    txtcarnet.value = "";
}