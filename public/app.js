 document.getElementById("formulario").addEventListener("submit", function(event){
  event.preventDefault()
  enviar();
});
 function seleccionar_vendedor(){
  let seleccionar=document.querySelector('#cliente').value;
  let avanzar=document.querySelector('#button_av');
  if(seleccionar!='no'){
    avanzar.removeAttribute('disabled');
  }else{
    avanzar.setAttribute('disabled','true');
  }
 }
 async function enviar() {
    let form= document.getElementById('formulario');
    let data=new FormData(form);
    await fetch("https://app.form.phoenixtechsa.com/api/formulario",{
      method:'post',
      body:data
    }).then(m=>m.json()).then(m=>{
      console.log(m)
      if(m.status==200){
        form.reset();
        let des=document.querySelectorAll('.descuentos_checkbox');
        des.forEach(function(element2, index) {
          element2.removeAttribute('disabled');
        });
        swal({
          title: "Consulta exitosa",
          text: m.message,
          icon: "success",
        }).then(a=>{
          window.location.reload();
        });
      }else{
        swal({
          title: "Error en consulta",
          text: m.message,
          icon: "error",
        });
      }
    }).catch(e=>{
      swal({
      title: "Error en consulta",
      text: "Error en la data",
      icon: "error",
    });
  });

  }
  function rellenar(){
    let activar_form=document.getElementById("activar_form");
    let relleno=document.getElementById("relleno");

    if(relleno.style.display=='none'){
      relleno.style.display='flex'
    }else{
      relleno.style.display='none'
    }

    if(activar_form.style.display=='none'){
      activar_form.style.display='block'
    }else{
      activar_form.style.display='none'
    }
  }

  (async ( a,b) => {
     let check=document.querySelectorAll('.descuentos_checkbox');
     check.forEach( function(element, index) {
       element.addEventListener('change', (event) => {
          let check2=document.querySelectorAll('.descuentos_checkbox');
          let cuantos_hay=0;
          check2.forEach( function(element2, index) {
            if(element2.checked){
              cuantos_hay++;
            }
          });

          if(cuantos_hay>2){
            check2.forEach( function(element2, index) {
              if(!element2.checked){
                element2.setAttribute('disabled','true');
              }
            });
          }else{
            check2.forEach( function(element2, index) {
              element2.removeAttribute('disabled');
            });
          }
       });
     });
  }) ( window,document);
