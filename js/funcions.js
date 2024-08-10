$(function() {
  var actual_fs, next_fs,prev_fs;


  $('.next').click(function() {
    actual_fs=$(this).parent();
    next_fs=$(this).parent().next();
  $('#progress li').eq($('fieldset').index(next_fs)).addClass('activo')
    actual_fs.hide(800);
    next_fs.show(800);
  });

  $('.prev').click(function() {
    actual_fs=$(this).parent();
    prev_fs=$(this).parent().prev();
  $('#progress li').eq($('fieldset').index(actual_fs)).removeClass('activo')
    actual_fs.hide(800);
    prev_fs.show(800);
  });


  $('#pase1').click(function() {
    return false;
  });
  $('#pase2').click(function() {
    return false;
  });
  $('#pase3').click(function() {
    return false;
  });
  $('#pase4').click(function() {
    return false;
  });
  $('#enviar').click(function() {
    return true;
  });
  $('#pase5').click(function() {
    return false;
  });
  $('#pase6').click(function() {
    return false;
  });
  $('#pase7').click(function() {
    return false;
  });
  $('#pase8').click(function() {
    return false;
  });
  $('#enviar2').click(function() {
    return true;
  });


});
