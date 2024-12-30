$(document).ready(function(){
    $("#sucursal_toluca").on("click",function(){
        $(".sucursal").val(1);
        $('.imagen_sucursal').css('border','0');
        $(this).css('border', '5px solid white').css('border-radius','25px');
    
    });
    $("#sucursal_metepec").on("click",function(){
        $(".sucursal").val(3);
        $('.imagen_sucursal').css('border','0');
        $(this).css('border', '5px solid white').css('border-radius','25px');
    });
    $("#sucursal_santafe").on("click",function(){
        $(".sucursal").val(2);
        $('.imagen_sucursal').css('border','0');
        $(this).css('border', '5px solid white').css('border-radius','25px');
    });
    $("#sucursal_zibata").on("click",function(){
        $(".sucursal").val(4);
        $('.imagen_sucursal').css('border','0');
        $(this).css('border', '5px solid white').css('border-radius','25px');
    });

    // Validar Boton empezar
    $(".imagen_sucursal").on("click",function(){
        var fecha=$("#fecha_nacimiento").val();
        var plantel=$(".sucursal").val();
        if (fecha != '' && plantel != 0) {
            $(".empezar_btn").prop('disabled',false);
        }
    }); 

    $("#fecha_nacimiento").on("change",function(){
        var fecha=$("#fecha_nacimiento").val();
        var plantel=$(".sucursal").val();
        if (fecha != '' && plantel != 0) {
            $(".empezar_btn").prop('disabled',false);
        }
    }); 

});
