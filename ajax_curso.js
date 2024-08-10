
$(buscar_curso());

function buscar_curso(consul){
  $.ajax({
    url: 'ajax_curso.php',
    type: 'POST',
    dataType: 'html',
    data: {consul: consul},
  })
  .done(function(respuesta){
  if(respuesta!=0){
    $('#cont_comb_curso').html(respuesta);
  }
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('change','#periodo', function(){
  var valr= $(this).val();
  if(valr!=""){
    buscar_curso(valr);
  }
});
