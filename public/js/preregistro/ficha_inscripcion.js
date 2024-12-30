$(document).ready(function(){
    $(".fotonino").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file1").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".fotopapa").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file3").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".fotomama").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file2").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".foto1").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file4").css("background-image", "url(" + imgUrl + ")");
        }
    });

    $(".foto2").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file5").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".foto3").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file6").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".foto4").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file7").css("background-image", "url(" + imgUrl + ")");
        }
    });
    $(".foto5").on("change", function() {
        var archivo = $(this).val();
        if (archivo.length > 0) {
            var file = this.files[0];
            var imgUrl = URL.createObjectURL(file);
            $("#src-file8").css("background-image", "url(" + imgUrl + ")");
        }
    });

    var input= document.getElementById('telefono1_mama');
    input.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input2= document.getElementById('telefono2_mama');
    input2.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input3= document.getElementById('celular_mama');
    input3.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input4= document.getElementById('telefono1_papa');
    input4.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input5= document.getElementById('telefono2_papa');
    input5.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input6= document.getElementById('celular_papa');
    input6.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input7= document.getElementById('telefono1_emergencia');
    input7.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input8= document.getElementById('telefono2_emergencia');
    input8.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

    var input9= document.getElementById('celular_emergencia');
    input9.addEventListener('input',function(){
        if (this.value.length > 10)
           this.value = this.value.slice(0,10);
    });

// Cambiar Autorizados
    $("input[name=cambiar_autorizados]").on("change",function(){
        if( $(this).is(':checked') ) {
            $("input[name=nombre_1]").val('').removeAttr('readonly');
            $("input[name=nombre_2]").val('').removeAttr('readonly');
            $("input[name=nombre_3]").val('').removeAttr('readonly');
            $("input[name=nombre_4]").val('').removeAttr('readonly');
            $("input[name=nombre_5]").val('').removeAttr('readonly');

            $("input[name=parentesco_1]").val('').removeAttr('readonly');
            $("input[name=parentesco_2]").val('').removeAttr('readonly');
            $("input[name=parentesco_3]").val('').removeAttr('readonly');
            $("input[name=parentesco_4]").val('').removeAttr('readonly');
            $("input[name=parentesco_5]").val('').removeAttr('readonly');

            $(".foto1").attr("required", true).removeAttr('disabled',false);
            $(".foto2").removeAttr('disabled',false);
            $(".foto3").removeAttr('disabled',false);
            $(".foto4").removeAttr('disabled',false);
            $(".foto5").removeAttr('disabled',false);

            $(".div_foto1").val('').removeAttr('style',true).css('background-color','white');
            $(".div_foto2").val('').removeAttr('style',true).css('background-color','white');
            $(".div_foto3").val('').removeAttr('style',true).css('background-color','white');
            $(".div_foto4").val('').removeAttr('style',true).css('background-color','white');
            $(".div_foto5").val('').removeAttr('style',true).css('background-color','white');
        }else{
            location.reload()
        }
    });

    $("input[name=cambiar_tutores]").on("change",function(){
        if( $(this).is(':checked') ) {
            $("input[name=nombre_mama]").val('');
            $("input[name=telefono1_mama]").val('');
            $("input[name=telefono2_mama]").val('');
            $("input[name=celular_mama]").val('');
            $("input[name=direccion_mama]").val('');
            $("input[name=email_mama]").val('');

            $("input[name=nombre_papa]").val('');
            $("input[name=telefono1_papa]").val('');
            $("input[name=telefono2_papa]").val('');
            $("input[name=celular_papa]").val('');
            $("input[name=direccion_papa]").val('');
            $("input[name=email_papa]").val('');

            $(".div_fotopapa").val('').removeAttr('style',true).css('background-color','white');
            $(".div_fotomama").val('').removeAttr('style',true).css('background-color','white');
        }
    });

    $("input[name=repetir_tutor]").on("change",function(){
        if( $(this).is(':checked') ) {
            // console.log('object');
            $("input[name=nombre_papa]").val('').removeAttr('required').attr('disabled',true);
            $("input[name=telefono1_papa]").val('').removeAttr('required').attr('disabled',true);
            $("input[name=telefono2_papa]").val('').removeAttr('required').attr('disabled',true);
            $("input[name=celular_papa]").val('').removeAttr('required').attr('disabled',true);
            $("input[name=direccion_papa]").val('').removeAttr('required').attr('disabled',true);
            $("input[name=email_papa]").val('').removeAttr('required').attr('disabled',true);
            $(".div_fotopapa").attr('disabled',true).removeAttr('style').css('background-color','#dcdcdc')
            $("input[name=foto_papa]").val('').removeAttr('required').attr('disabled',true);
        }else{
            $("input[name=nombre_papa]").removeAttr('disabled').attr('required', true);
            $("input[name=telefono1_papa]").removeAttr('disabled').attr('required', true);
            $("input[name=telefono2_papa]").removeAttr('disabled').attr('required', true);
            $("input[name=celular_papa]").removeAttr('disabled').attr('required', true);
            $("input[name=direccion_papa]").removeAttr('disabled').attr('required', true);
            $("input[name=email_papa]").removeAttr('disabled').attr('required', true);
            $(".div_fotopapa").removeAttr('disabled').css('background-color', '');
            $("input[name=foto_papa]").removeAttr('disabled').attr('required', true);
        }
    });

});
