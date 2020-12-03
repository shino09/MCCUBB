  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alumno</title>

    <!-- Bootstrap -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}    -->
         <link rel="stylesheet" href="js/query13.min.css">

    {!!Html::script('select2-4.0.3/vendor/jquery-2.1.0.js')!!}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/navbar-fixed-top.css')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('select2-4.0.3/dist/js/select2.js')!!}
    {!!Html::style('select2-4.0.3/dist/css/select2.css',['rel'=>"stylesheet"])!!}
 <!--{!!Html::style('css/select2.min.css')!!}
            {!!Html::script('js/select2.min.js')!!}
                        {!!Html::script('js/jquery1.min.js')!!}-->


    
<!--{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 --}}-->



     <link rel="stylesheet" href="css/select2.min.css">
    <script src="js/select2.min.js"></script>


  </head>



                <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>


<div class="box-body col-xs-12">
<div class="form-group col-xs-6 required"   id="form-id-error">
    {!! Form::label("id","RUT *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
</div>


<div class="form-group  col-xs-6 required" id="form-ALU_EMAIL-error">
    {!! Form::label("ALU_EMAIL","Email*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_EMAIL",null,["class"=>"form-control required"]) !!}
        <span id="ALU_EMAIL-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6  required" id="form-ALU_NOMBRES-error">
    {!! Form::label("ALU_NOMBRES","Nombre*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_NOMBRES",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="ALU_NOMBRES-error" class="help-block"></span>
    </div>
</div>

<div class="form-group  col-xs-6 required" id="form-ALU_TITULO-error">
    {!! Form::label("ALU_TITULO","Titulo*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_TITULO",null,["class"=>"form-control required"]) !!}
        <span id="ALU_TITULO-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-ALU_PATERNO-error">
    {!! Form::label("ALU_PATERNO","A. Paterno*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_PATERNO",null,["class"=>"form-control required"]) !!}
        <span id="ALU_PATERNO-error" class="help-block"></span>
    </div>
</div>

<div class="form-group  col-xs-6 required" id="form-ALU_GRADO-error">
    {!! Form::label("ALU_GRADO","Grado*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_GRADO",null,["class"=>"form-control required"]) !!}
        <span id="ALU_GRADO-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-ALU_MATERNO-error">
    {!! Form::label("ALU_MATERNO","A. Materno*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_MATERNO",null,["class"=>"form-control required"]) !!}
        <span id="ALU_MATERNO-error" class="help-block"></span>
    </div>
</div>



<div class="form-group  col-xs-6 required" id="form-ALU_TELEFONO-error">
    {!! Form::label("ALU_TELEFONO","Telefono*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_TELEFONO",null,["class"=>"form-control required"]) !!}
        <span id="ALU_TELEFONO-error" class="help-block"></span>
    </div>
</div>














<div class="form-group  col-xs-6 required" id="form-ALU_PUNTAJE-error">
    {!! Form::label("ALU_PUNTAJE","Puntaje*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALU_PUNTAJE",null,["class"=>"form-control required"]) !!}
        <span id="ALU_PUNTAJE-error" class="help-block"></span>
    </div>
</div>





<div class="form-group col-xs-6   required" id="form-ALU_ANOINGRESO-error">
    {!! Form::label("ALU_ANOINGRESO","Año Ingreso*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
 {!! Form::select('ALU_ANOINGRESO', ['2009' => '2009','2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029','2030' => '2030' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione ALU_ANOINGRESO']) !!}        <span id="ALU_ANOINGRESO-error" class="help-block"></span>
    </div>
</div>








<div class="form-group col-xs-6 " required" id="form-profesor-error">
    {!! Form::label("UNIVERSIDAD_id","Universidad*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-13" >
     

            {!! Form::select('UNIVERSIDAD_id',$universidads,null,['id'=>'universidads','class'=>'js-example-responsive','style'=>'width: 50%']) !!}   


        <span id="profesor-error" class="help-block"></span>
    </div>
</div>


<div class="form-group  col-xs-6 required" id="form-ALU_ESTADO-error">
    {!! Form::label("ALU_ESTADO","Estado*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('ALU_ESTADO', ['0' => 'Vigente','1' => 'Retiro Temporal' ,'2' => 'Egresado' ,'3' => 'Titulado' ,'4' => 'Perdida de carrera' ,'5' => 'Tesis' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione ALU_ESTADO']) !!}

        <span id="ALU_ESTADO-error" class="help-block"></span>
    </div>
</div>

</div>

 <p class="help-block">- RUT y Email deben ser validos</p>

                <p class="help-block">- RUT y Email deben ser unicos</p>

 <p class="help-block">- Fijese que no queden  espacios en blanco antes del RUT y el Email</p>


<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('alumno/list')" class="btn btn-danger"><i
                    class="fa fa-times"></i>
            Cancelar</a>
        {!! Form::button("<i class='fa fa-save'></i> Guardar",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script>
    $("#frm").submit(function (event) {
        event.preventDefault();
        $('.loading').show();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('name');
                        if (index in data.errors) {
                            $("#form-" + index + "-error").addClass("has-error");
                            $("#" + index + "-error").html(data.errors[index]);
                        }
                        else {
                            $("#form-" + index + "-error").removeClass("has-error");
                            $("#" + index + "-error").empty();
                        }
                    });
                    $('#focus').focus().select();
                } else {
                    $(".has-error").removeClass("has-error");
                    $(".help-block").empty();
                    $('.loading').hide();
                    ajaxLoad(data.url, data.content);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });
</script> 
<script>
  
      $("#universidads").select2({
      theme: "classic",
      templateResult: formatState
      // templateSelection: formatState
      });

    function formatState (state)
   {
      if (!state.id) { return state.text; }
      var $state = $(
        '<span>' + state.text + '</span>'
      );
      return $state;
  };



</script>


