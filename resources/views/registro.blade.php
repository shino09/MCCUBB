

@extends('layouts.principal')
  @section('content')
  @include('alerts.errors')
  @include('alerts.request')
    <div class="header">
      <div class="top-header">
        <div class="logo"  >
          <!--<p style="color: #369;"> Magister Ciencias de la computacion </p>

          <a href="index.html"><img src="images/logoubb.jpg" alt="" /></a>-->
        
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="header-info" >



  <!--<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">-->
      </div><!-- /.login-logo -->

      <br>
         <br>
            <br>
               <br>
                  <br>
                     <br>
                        <br>
                          
      <div align="left" class="col-sm-12">
              <div class="row">

        <div class="col-md-6"><b> Registro en el sistema</b>
       
        <form action="register" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
          
          <div class="form-group has-feedback">
            <label>nombre</label>
            <input type="text" class="form-control" name="name" >
          </div>


           <div class="form-group has-feedback">
             <label>rut</label>
            <input type="rut" class="form-control" name="rut" >
          </div>

          <div class="form-group has-feedback">
                <label>password</label>
            <input type="password" class="form-control" name="password" >
          </div>

   <div>
                          <label>confirme password</label> <br>

              {!!Form::password('password_confirmation')!!}
          </div>

<br>
         
          <div class="row">
            

            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </div><!-- /.col -->
          </div>
        </form>

     
       
</div>
</div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
   

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

  @endsection 