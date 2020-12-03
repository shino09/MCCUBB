<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Magister | UBB</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/sb-admin-2..css">

      <link rel="stylesheet" href="css/font-awesome.min.css">

       <link rel="stylesheet" href="css/ionicons.min.css">
<link rel="shortcut icon" href="images/favicon.ico" >
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  </head>
  <body class="hold-transition skin-yellow-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{!!URL::to('/hola')!!}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>U</b>BB</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Magister</b>UBB</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">





 <div>
            <ul class="nav navbar-top-links navbar-right">

                         
                              

                                <li>

                                                                   

                                    <a href="{!!URL::to('/logout')!!}"><i class='fa fa-sign-out fa-fw'></i>Salir  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </a>
                                </li>

                               
                        </ul>

</div>

<div>
<ul class="nav navbar-top-links navbar-right">
<li>
 <a href="#"><i class='fa fa-user fa-fw'></i>  {!!Auth::user()->name!!}  {!!Auth::user()->APELLIDOPATERNO!!} {!!Auth::user()->APELLIDOMATERNO!!} </a>
 </ul>
 </li>
 </div>






        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
      
              <!-- Control Sidebar Toggle Button -->
            
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
          <!-- Sidebar user panel -->
          
      
          <ul class="sidebar-menu">
            <li class="header">

        <a href="{!!URL::to('/hola')!!}" class="logo">

              <div style="text-align: center"><img src="images/logoubbface.png" width="150" /></div>
</a>
            </li>









 <li class="disactive treeview">
              <a href="{!!URL::to('/alumno')!!}">
                <i class="fa fa-graduation-cap"></i> <span>Alumnos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/alumno')!!}"><i class="fa fa-circle-o"></i>Gestionar Alumnos</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/asiste3')!!}"><i class="fa fa-circle-o"></i>Congresos Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/participa3')!!}"><i class="fa fa-circle-o"></i>Talleres Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/presenta3')!!}"><i class="fa fa-circle-o"></i>Solicitudes Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/publica3')!!}"><i class="fa fa-circle-o"></i>Revistas Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/posee3')!!}"><i class="fa fa-circle-o"></i>Beneficios Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/tiene3')!!}"><i class="fa fa-circle-o"></i>Trabajos Alumnos</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/orienta6')!!}"><i class="fa fa-circle-o"></i>Orientar Alumnos</a></li>
              </ul>
             
            </li>



 <li class="disactive treeview">
              <a href="{!!URL::to('/profesor')!!}">
                <i class="fa fa-university"></i> <span>Profesores</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/profesor')!!}"><i class="fa fa-circle-o"></i>Gestionar  Profesores</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/profesor3')!!}"><i class="fa fa-circle-o"></i>Crear un tipo de Profesor</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/director2')!!}"><i class="fa fa-circle-o"></i>Profesores Directores</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/nucleo2')!!}"><i class="fa fa-circle-o"></i>Profesores del Nucleo</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/colaborador2')!!}"><i class="fa fa-circle-o"></i>Profesores Colaboradores</a></li>
              </ul>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/visitante2')!!}"><i class="fa fa-circle-o"></i>Profesores Visitantes</a></li>
              </ul>
             <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/orienta4')!!}"><i class="fa fa-circle-o"></i>Profesor Orientador</a></li>
              </ul>
             
             
            </li>

            
   <li class="disactive treeview">
              <a href="{!!URL::to('#')!!}">
                <i class="fa fa-file-text"></i> <span>Tesis</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/tesis2')!!}"><i class="fa fa-circle-o"></i>Gestionar Tesis</a></li>
              </ul>
            
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/dirige8')!!}"><i class="fa fa-circle-o"></i>Dirigir Tesis</a></li>
              </ul>
            

              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/codirige7')!!}"><i class="fa fa-circle-o"></i>Codirigir Tesis</a></li>
              </ul>
          

               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/conforman17')!!}"><i class="fa fa-circle-o"></i>Conformar Tribunal </a></li>
              </ul>

      
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/evalua6')!!}"><i class="fa fa-circle-o"></i>Evaluar Tesis  </a></li>
              </ul>
            </li>


 <li class="disactive treeview">
              <a href="{!!URL::to('#')!!}">
                <i class="fa fa-line-chart"></i> <span>Informes </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/alumnoreportes')!!}"><i class="fa fa-circle-o"></i>Ficha Alumnos</a></li>
              </ul>

                <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/profesorreportes')!!}"><i class="fa fa-circle-o"></i>Ficha Profesores</a></li>
              </ul>

              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/tesisreportes3')!!}"><i class="fa fa-circle-o"></i>Ficha Tesis</a></li>
              </ul>

              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/tesisreportes5')!!}"><i class="fa fa-circle-o"></i>Ficha Tesis Terminadas</a></li>
              </ul>

               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/reportes')!!}"><i class="fa fa-circle-o"></i>Informes Tipo Listados</a></li>
              </ul>
          
            </li>

           

            <li class="disactive treeview">
              <a href="{!!URL::to('#')!!}">
                <i class="fa fa-plus"></i> <span>Crear Nuevo Recurso</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/congreso')!!}"><i class="fa fa-circle-o"></i>Congresos</a></li>
              </ul>

               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/taller')!!}"><i class="fa fa-circle-o"></i>Talleres</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/solicitud')!!}"><i class="fa fa-circle-o"></i>Solicitudes</a></li>
              </ul>
               <ul class="treeview-menu">
            
                <li><a href="{!!URL::to('/revista')!!}"><i class="fa fa-circle-o"></i>Revistas</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/beneficio')!!}"><i class="fa fa-circle-o"></i>Beneficios</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/trabajo')!!}"><i class="fa fa-circle-o"></i>Trabajos</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/universidad')!!}"><i class="fa fa-circle-o"></i>Universidades</a></li>
              </ul>
               <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/departamento')!!}"><i class="fa fa-circle-o"></i>Departamentos </a></li>
              </ul>
              
            </li>




                    </li>
                     @if(Auth::user()->tipoUsuario == 1)

            <li class="disactive treeview">
              <a href="{!!URL::to('/usuario')!!}">
                <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li><a href="{!!URL::to('/usuario')!!}"><i class="fa fa-circle-o"></i> Gestionar usuarios</a></li>
              </ul>
            </li>


                    @endif

            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
  
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          


 <div class="box box-primary col-xs-12">
                   
                       @yield('content')
</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong> &copy; 2017 Facultad de Ciencias Empresariales. Todos los derechos reservados  <a href="http://www.ubiobio.cl">Universidad del BÍO-BÍO</a>.</strong> 


      </footer>

  




    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
        <script src="js/jquery-ui.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="js/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="js/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
   
  @section('scripts')

    @show
  </body>

</html>
