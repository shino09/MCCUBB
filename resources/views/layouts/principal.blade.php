<!DOCTYPE html>
<html>
<head>
<title>Magister UBB</title>
{!!Html::style('css/bootstrap.css')!!}
{!!Html::style('css/style.css')!!}
<!-- Custom Theme files -->
{!!Html::script('js/jquery.min.js')!!}
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sistema Magister UBB" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href='css/fonts.googleapis.css' rel='stylesheet' type='text/css'>


<link rel="shortcut icon" href="images/favicon.ico" >

</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a class="active" href="{!!URL::to('/')!!}"><i class="home"></i></a></li>
					<!--<li><a href="{!!URL::to('/reviews')!!}"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>-->
					<li><a href="{!!URL::to('/contacto')!!}"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">
		
		@yield('content')
		
		
		
	<div class="footer">
		
		    <strong> &copy; 2017 Facultad de Ciencias Empresariales. Todos los derechos reservados  <a href="http://www.ubiobio.cl">Universidad del BÍO-BÍO</a>.</strong> 
 <a href="www.ubiobio.cl"></a>
	
	</div>	
	</div>
	</div>
			<script type="text/javascript">
		$(window).load(function() {
			
		  $("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 4
					}
				}
			});
			});
		</script>
		{!!Html::script('js/jquery.flexisel.js')!!}
		{!!Html::script('js/bootstrap.min.js')!!}
	<div class="clearfix"></div>
</body>
</html>