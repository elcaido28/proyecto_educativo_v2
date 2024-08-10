$(buscar_cedula());

function buscar_cedula(consulta){
  $.ajax({
    url: 'ajax_cedula_representante.php',
    type: 'POST',
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    document.getElementById('representa').value=respuesta;
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('change','#estudiante', function(){

  var valr= $(this).val();
  if(valr!=""){
    buscar_cedula(valr);
  }
});
