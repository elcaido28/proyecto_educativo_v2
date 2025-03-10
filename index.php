﻿<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido a Sistema Educativo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
          <script src="js/jquery/dist/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Arco Iris Infantil</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sistema Educativo</p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Cedula" name="cedula" maxlength="10">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="privilegio" required><option value="">-SELECCIONE-</option><option>Estudiante</option><option>Representante</option><option>Docente</option><option>Administrativo</option> </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <br>
    <script type="text/javascript">
    $(document).on('keyup','#cedula', function(){
      var cedula = document.getElementById('cedula').value;
      array = cedula.split( "" );
      num = array.length;
      if ( num == 10 )
      {
        total = 0;
        digito = (array[9]*1);
        for( i=0; i < (num-1); i++ )
        {
          mult = 0;
          if ( ( i%2 ) != 0 ) {
            total = total + ( array[i] * 1 );
          }
          else
          {
            mult = array[i] * 2;
            if ( mult > 9 )
              total = total + ( mult - 9 );
            else
              total = total + mult;
          }
        }
        decena = total / 10;
        decena = Math.floor( decena );
        decena = ( decena + 1 ) * 10;
        final = ( decena - total );
        if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
          $("#cedula").css({
            "background-color": "rgba(135, 228, 131, 0.5)"
          });
          return true;
        }
        else
        {
          alert( "La c\xe9dula NO es v\xe1lida!!!" );
          document.getElementById('cedula').value="";
          $("#cedula").css({
            "background-color": "rgba(0,0,0,0)"
          });
          return false;
        }
      }
      else
      {

        return false;
      }
    });
    </script>
    <a href="#">Olvidé mi contraseña</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="js/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
