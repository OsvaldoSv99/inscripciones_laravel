
$(document).ready(function(){
    // Validar Modal de indicaciones y cuidados
    var gradoId = $("#gradoId").val();
    var idAspirante = $("#idAspirante").val();
    $(".modal_indicaciones").on('click',function(){
        pregunta1();
    }); 
});

// Preguntas a Lactantes A
function pregunta1() {
    Swal.fire({
    icon: "warning",
    title: "Pregunta",
    text: '¿El bebé camina sin ayuda?',
    background:"#144580",
    color:"#fff",
    showDenyButton: true,
    confirmButtonColor: "#C9D358",
    confirmDenyButton: "#d33",
    denyButtonText: "No",
    confirmButtonText: "Si",
    }).then((result) => {
    if (result.isConfirmed) {
        var indicaciones = 3;
        guardarIndicaciones(indicaciones);
    } else if (result.isDenied) {
        pregunta2()
    }
    });
}

// Preguntas a Caminadores
function pregunta2() {
    Swal.fire({
    icon: "warning",
    title: "Pregunta",
    text: '¿El bebé gatea o se desplaza solo?',
    background:"#144580",
    color:"#fff",
    showDenyButton: true,
    confirmButtonColor: "#C9D358",
    confirmDenyButton: "#d33",
    denyButtonText: "No",
    confirmButtonText: "Si",
    }).then((result) => {    
    if (result.isConfirmed) {
    var indicaciones = 2;
    guardarIndicaciones(indicaciones);
    } else if (result.isDenied) {
    var indicaciones = 1;
    guardarIndicaciones(indicaciones);
    }
    });
}

// Ajax guardar Indicaciones
function guardarIndicaciones(indicaciones)
{
    var id_aspirante=$("#idAspirante").val();
    $.ajax({
        type: 'get',
        url: '../ajax_indicaciones',
        data: {
            indicaciones:indicaciones,
            id_aspirante:id_aspirante
        },
        success:function(data){
            location.href ='../indicaciones_cuidados/'+id_aspirante;
        },
        error:function(data){
            // console.log(data)
        }
    })
}