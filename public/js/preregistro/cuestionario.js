$(document).ready(function(){
    // Check alimentos
    $(".check_alimento").on("change",function(){
         if( $(this).is(':checked') ) {
             $("input[name=alergia_alimentos]").removeAttr('readonly',false).val('')
        }else{
             $("input[name=alergia_alimentos]").prop('readonly',true).val('')
         }
    });
    // Check medicamentos
    $("input[name=check_medicamentos]").on("change",function(){
         if( $(this).is(':checked') ) {
             $("input[name=alergia_medicamentos]").removeAttr('readonly',false).val('')
        }else{
             $("input[name=alergia_medicamentos]").prop('readonly',true).val('')
         }
    });
    // Check animales
    $("input[name=check_animales]").on("change",function(){
         if( $(this).is(':checked') ) {
             $("input[name=alergia_animales]").removeAttr('readonly',false).val('')
        }else{
             $("input[name=alergia_animales]").prop('readonly',true).val('')
         }
    });
    // Check agentes ambientales
    $("input[name=check_ambiente]").on("change",function(){
         if( $(this).is(':checked') ) {
             $("input[name=alergia_ambiente]").removeAttr('readonly',false).val('')
        }else{
             $("input[name=alergia_ambiente]").prop('readonly',true).val('')
         }
    });
    // Check agentes ambientales
    $("input[name=check_otroalergia]").on("change",function(){
         if( $(this).is(':checked') ) {
             $("input[name=alergia_otro]").removeAttr('readonly',false).val('')
        }else{
             $("input[name=alergia_otro]").prop('readonly',true).val('')
         }
    });
    // Check Ninguno
    $("input[name=check_ningunoalergia]").on("change",function(){
        // Validar todos los inputs de alergias
        if( $(this).is(':checked') ) {
        $("input[name=check_alimento]").prop("checked", false).prop('disabled',true);
        $("input[name=check_medicamentos]").prop("checked", false).prop('disabled',true);
        $("input[name=check_animales]").prop("checked", false).prop('disabled',true);
        $("input[name=check_ambiente]").prop("checked", false).prop('disabled',true);
        $("input[name=check_otroalergia]").prop("checked", false).prop('disabled',true);

        $("input[name=alergia_alimentos]").prop('readonly',true).val('')
        $("input[name=alergia_medicamentos]").prop('readonly',true).val('')
        $("input[name=alergia_animales]").prop('readonly',true).val('')
        $("input[name=alergia_ambiente]").prop('readonly',true).val('')
        $("input[name=alergia_otro]").prop('readonly',true).val('')

        }else{
        $("input[name=check_alimento]").prop("checked", false).prop('disabled',false);
        $("input[name=check_medicamentos]").prop("checked", false).prop('disabled',false);
        $("input[name=check_animales]").prop("checked", false).prop('disabled',false);
        $("input[name=check_ambiente]").prop("checked", false).prop('disabled',false);
        $("input[name=check_otroalergia]").prop("checked", false).prop('disabled',false);

        $("input[name=alergia_alimentos]").prop('readonly',true).val('')
        $("input[name=alergia_medicamentos]").prop('readonly',true).val('')
        $("input[name=alergia_animales]").prop('readonly',true).val('')
        $("input[name=alergia_ambiente]").prop('readonly',true).val('')
        $("input[name=alergia_otro]").prop('readonly',true).val('')
        }
    });

    // Seleccion cartilla de vacunacion
    $("input[name=vacunacion]").on("change",function(){
        var vacunacion=$(this).val();
        if (vacunacion == 1 ) {
            $("input[name=vacunas_pendientes]").prop('readonly',true).val('')
        } else {
            $("input[name=vacunas_pendientes]").prop("readonly",false).val('')
        }
    });
    // Seleccion medicamentos cronicos
    $("input[name=medicamentos_cro]").on("change",function(){
        var medicamentos_cro=$(this).val();
        if (medicamentos_cro == 0 ) {
            $("input[name=medicamentos_cronicos]").prop('readonly',true).val('')
        } else {
            $("input[name=medicamentos_cronicos]").prop("readonly",false).val('')
        }
    });

    // Validacion condiciones fisicas ninguna
    $("input[name=ninguna_al]").on("change",function(){
        if( $(this).is(':checked') ) {
            $("input[name=migrana_al]").prop("checked", false).prop('disabled',true);
            $("input[name=diabetes_al]").prop("checked", false).prop('disabled',true);
            $("input[name=miopia_al]").prop("checked", false).prop('disabled',true);
            $("input[name=epilepsia_al]").prop("checked", false).prop('disabled',true);
            $("input[name=hipertension_al]").prop("checked", false).prop('disabled',true);
            $("input[name=obesidad_al]").prop("checked", false).prop('disabled',true);
            $("input[name=astigmatismo_al]").prop("checked", false).prop('disabled',true);
            $("input[name=otro_condiciones_al]").prop("checked", false).prop('disabled',true);
            $("input[name=condiciones_al_otro]").prop('readonly',true).val('')
        }else{
            $("input[name=migrana_al]").prop("checked", false).prop('disabled',false);
            $("input[name=diabetes_al]").prop("checked", false).prop('disabled',false);
            $("input[name=miopia_al]").prop("checked", false).prop('disabled',false);
            $("input[name=epilepsia_al]").prop("checked", false).prop('disabled',false);
            $("input[name=hipertension_al]").prop("checked", false).prop('disabled',false);
            $("input[name=obesidad_al]").prop("checked", false).prop('disabled',false);
            $("input[name=astigmatismo_al]").prop("checked", false).prop('disabled',false);
            $("input[name=otro_condiciones_al]").prop("checked", false).prop('disabled',false);
            $("input[name=condiciones_al_otro]").prop('readonly',true).val('')
        }
    });

    // Check condiciones fisicas
    $("input[name=otro_condiciones_al]").on("change",function(){
        if( $(this).is(':checked') ) {
            $("input[name=condiciones_al_otro]").removeAttr('readonly',false).val('')
       }else{
            $("input[name=condiciones_al_otro]").prop('readonly',true).val('')
        }
    });

        // Validacion condiciones fisicas ninguna
        $("input[name=ninguna_dis_al]").on("change",function(){
            if( $(this).is(':checked') ) {
                $("input[name=motriz_al]").prop("checked", false).prop('disabled',true);
                $("input[name=neurologica_al]").prop("checked", false).prop('disabled',true);
                $("input[name=visual_al]").prop("checked", false).prop('disabled',true);
                $("input[name=auditiva_al]").prop("checked", false).prop('disabled',true);
                $("input[name=otra_al_discapacidad]").prop("checked", false).prop('disabled',true);
                $("input[name=discapacidad_al_otra]").prop('readonly',true).val('')
            }else{
                $("input[name=motriz_al]").prop("checked", false).prop('disabled',false);
                $("input[name=neurologica_al]").prop("checked", false).prop('disabled',false);
                $("input[name=visual_al]").prop("checked", false).prop('disabled',false);
                $("input[name=auditiva_al]").prop("checked", false).prop('disabled',false);
                $("input[name=otra_al_discapacidad]").prop("checked", false).prop('disabled',false);
                $("input[name=discapacidad_al_otra]").prop('readonly',true).val('')
            }
        });

        // Check condiciones fisicas
    $("input[name=otra_al_discapacidad]").on("change",function(){
        if( $(this).is(':checked') ) {
            $("input[name=discapacidad_al_otra]").removeAttr('readonly',false).val('')
       }else{
            $("input[name=discapacidad_al_otra]").prop('readonly',true).val('')
        }
    });

    // Tutores
        // Validacion condiciones fisicas ninguna
        $("input[name=ninguno_t1]").on("change",function(){
            if( $(this).is(':checked') ) {
                $("input[name=migraña_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=diabetes_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=miopia_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=epilepsia_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=hipertension_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=obesidad_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=astigmatismo_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=fumador_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=embarazo_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=otro_condicion_t1]").prop("checked", false).prop('disabled',true);
                $("input[name=condicion_t1]").prop('readonly',true).val('')
            }else{
                $("input[name=migraña_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=diabetes_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=miopia_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=epilepsia_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=hipertension_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=obesidad_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=astigmatismo_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=fumador_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=embarazo_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=otro_condicion_t1]").prop("checked", false).prop('disabled',false);
                $("input[name=condicion_t1]").prop('readonly',true).val('')
            }
        });

                // Check condiciones fisicas tutores 1
        $("input[name=otro_condicion_t1]").on("change",function(){
            if( $(this).is(':checked') ) {
                $("input[name=condicion_t1]").removeAttr('readonly',false).val('')
           }else{
                $("input[name=condicion_t1]").prop('readonly',true).val('')
            }
        });
       
        // Validacion condiciones fisicas ninguna tutor 2
        $("input[name=ninguno_t2]").on("change",function(){
            if( $(this).is(':checked') ) {
                $("input[name=migraña_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=diabetes_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=miopia_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=epilepsia_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=hipertension_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=obesidad_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=astigmatismo_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=fumador_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=embarazo_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=otro_condicion_t2]").prop("checked", false).prop('disabled',true);
                $("input[name=condicion_t2]").prop('readonly',true).val('')
            }else{
                $("input[name=migraña_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=diabetes_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=miopia_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=epilepsia_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=hipertension_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=obesidad_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=astigmatismo_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=fumador_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=embarazo_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=otro_condicion_t2]").prop("checked", false).prop('disabled',false);
                $("input[name=condicion_t2]").prop('readonly',true).val('')
            }
        });

                // Check condiciones fisicas tutores 2
        $("input[name=otro_condicion_t2]").on("change",function(){
            if( $(this).is(':checked') ) {
                $("input[name=condicion_t2]").removeAttr('readonly',false).val('')
           }else{
                $("input[name=condicion_t2]").prop('readonly',true).val('')
            }
        });

        // Telefonos
        var input= document.getElementById('telefono1_emergencia');
        input.addEventListener('input',function(){
            if (this.value.length > 10) 
               this.value = this.value.slice(0,10); 
        });
        
        var input2= document.getElementById('telefono2_emergencia');
        input2.addEventListener('input',function(){
            if (this.value.length > 10) 
               this.value = this.value.slice(0,10); 
        });

        var input3= document.getElementById('telefono_t1');
        input3.addEventListener('input',function(){
            if (this.value.length > 10) 
               this.value = this.value.slice(0,10); 
        });
        var input4= document.getElementById('telefono_t2');
        input4.addEventListener('input',function(){
            if (this.value.length > 10) 
               this.value = this.value.slice(0,10); 
        });
        

});
