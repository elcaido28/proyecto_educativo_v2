
$(crusar_curso());

function crusar_curso(consu){
  $.ajax({
    url: 'ajax_matri_cusar_curso.php',
    type: 'POST',
    dataType: 'html',
    data: {consu: consu},
  })
  .done(function(respuesta){

  if(respuesta!=""){
    //alert(respuesta);
    $('#cont_comb_curso').html(respuesta);

  }
  })
  .fail(function(){
    console.log("error")
  })
}

$(document).on('change','#matri_curso_peri', function(){
  var valr= $(this).val();
  if(valr!=""){
    crusar_curso(valr);
  }
});
