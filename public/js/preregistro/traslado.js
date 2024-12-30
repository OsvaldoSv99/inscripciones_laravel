$(document).ready(function(){
    var input= document.getElementById('telefono_mama');
input.addEventListener('input',function(){
    if (this.value.length > 10) 
       this.value = this.value.slice(0,10); 
});
var input2= document.getElementById('telefono_papa');
input2.addEventListener('input',function(){
    if (this.value.length > 10) 
       this.value = this.value.slice(0,10); 
});
var input3= document.getElementById('curp');
input3.addEventListener('input',function(){
    if (this.value.length > 18) 
       this.value = this.value.slice(0,18); 
});
var input4= document.getElementById('curp_mama');
input4.addEventListener('input',function(){
    if (this.value.length > 18) 
       this.value = this.value.slice(0,18); 
});
var input4= document.getElementById('curp_papa');
input4.addEventListener('input',function(){
    if (this.value.length > 18) 
       this.value = this.value.slice(0,18); 
});
})
