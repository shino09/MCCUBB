  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tesis</title>

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
                                <p class="help-block">- Debe fijar una fecha de inicio</p>


<div class="box-body col-xs-16">


<div class="form-group col-xs-6  required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_NOMBRE","Nombre*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_NOMBRE",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6  required" id="form-TES_ANO-error">
    {!! Form::label("TES_ANO","Año*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_ANO",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TES_ANO-error" class="help-block"></span>
    </div>
</div>



<!--
<div class="form-group col-xs-6   required" id="form-TES_ANO-error">
    {!! Form::label("TES_ANO","TES_ANO*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
 {!! Form::select('TES_ANO', ['2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029','2030' => '2030' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione TES_SEMESTRE']) !!}        <span id="TES_ANO-error" class="help-block"></span>
    </div>
</div>-->

<div class="form-group col-xs-10 " required" id="form-ALUMNO_id-error">
    {!! Form::label("ALUMNO_id","Alumno*",["class"=>"control-label col-md-2"]) !!}
    <div class="col-md-10" >
     

            {!! Form::select('ALUMNO_id',$alumno,null,['id'=>'alumno','class'=>'js-example-responsive','style'=>'width: 50%']) !!}   


        <span id="ALUMNO_id-error" class="help-block"></span>
    </div>
</div>









<!--<div class="form-group  col-xs-6 required" id="form-TES_ESTADO-error">
    {!! Form::label("TES_ESTADO","TES_ESTADO*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('TES_ESTADO', ['0' => 'Inscrita','1' => 'Renunciada' ,'2' => 'Postergada' ,'3' => 'Reporbada' ,'4' => 'Aprobada' ,'5' => 'No cumple requisito' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione TES_ESTADO']) !!}

        <span id="TES_ESTADO-error" class="help-block"></span>
    </div>
</div>-->




<!--<div class="form-group col-xs-6   required" id="form-TES_NOTA-error">
    {!! Form::label("TES_NOTA","TES_NOTA*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">

            {!! Form::select('TES_NOTA', ['',
            '7.0' => '7.0','6.9' => '6.9' ,'6.8' => '6.8' ,'6.7' => '6.7' ,'6.6' => '6.6' ,'6.5' => '6.5','6.4' => '6.4','6.3' => '6.3' ,'6.2' => '6.2' ,'6.1' => '6.1' ,'6.0' => '6.0'  ,'5.9' => '5.9' ,'5.8' => '5.8' ,'5.7' => '5.7' ,'5.6' => '5.6' ,'5.5' => '5.5','5.4' => '5.4','5.3' => '5.3' ,'5.2' => '5.2' ,'5.1' => '5.1' ,'5.0' => '5.0' ,'4.9' => '4.9' ,'4.8' => '4.8' ,'4.7' => '4.7' ,'4.6' => '4.6' ,'4.5' => '4.5','4.4' => '4.4','4.3' =>'4.3' ,'4.2' => '4.2' ,'4.1' => '4.1' ,'4.0' => '4.0 ', '3.9' => '3.9' ,'3.8' => '3.8' ,'3.7' => '3.7' ,'3.6' => '3.6' ,'3.5' => '3.5','3.4' => '3.4','3.3' => '3.3' ,'3.2' => '3.2' ,'3.1' => '3.1' ,'3.0' => '3.0 ' ,'2.9' =>'2.9' ,'2.8' =>'2.8' ,'2.7' =>'2.7' ,'2.6' =>'2.6' ,'2.5' =>'2.5','2.4' => '2.4','2.3' =>'2.3' ,'2.2' =>'2.2' ,'2.1' =>'2.1' ,'2.0' =>'2.0' ,'1.9' =>'1.9' ,'1.8' =>'1.8' ,'1.7' =>'1.7' ,'1.6' =>'1.6' ,'1.5' => '1.5','1.4' => '1.4','1.3' =>'1.3' ,'1.2' =>'1.2' ,'1.1' =>'1.1' ,'1.0' => '1.0 '],null,['required', 'class' => 'form-control','placeholder'=>'Selecione TES_NOTA']) !!}        <span id="TES_NOTA-error" class="help-block"></span>
    </div>
</div>-->



    
<div class="form-group col-xs-6   required" id="form-TES_FECHAINICIO-error">
    {!! Form::label("TES_FECHAINICIO","Fecha Inicio*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
{!! Form::text('TES_FECHAINICIO', null, array('class' => 'form-control required input-sm','placeholder' => 'Ingrese una fecha','data-provide' => 'datepicker')) !!}
        <span id="TES_FECHAINICIO-error" class="help-block"></span>
    </div>
</div>


<div class="form-group  col-xs-6 required" id="form-TES_SEMESTRE-error">
    {!! Form::label("TES_SEMESTRE","Semestre*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('TES_SEMESTRE', ['1' => '1','2' => '2' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione TES_SEMESTRE']) !!}

        <span id="TES_SEMESTRE-error" class="help-block"></span>
    </div>
</div>





<div class="form-group  col-xs-6 required" id="form-TES_ESTADO-error">
    {!! Form::label("TES_ESTADO","Estado*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('TES_ESTADO', ['0' => 'Inscrita','1' => 'Renunciada' ,'2' => 'Postergada'  ,'5' => 'No cumple requisito' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione TES_ESTADO']) !!}

        <span id="TES_ESTADO-error" class="help-block"></span>
    </div>
    </div>


<!--<div class="form-group col-xs-6 required" id="form-TES_FECHAFINAL-error">
    {!! Form::label("TES_FECHAFINAL","FECHAFINAL*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
{!! Form::text('TES_FECHAFINAL', null, array('class' => 'form-control input-sm','placeholder' => 'Ingrese una fecha','data-provide' => 'datepicker')) !!}
        <span id="TES_FECHAFINAL-error" class="help-block"></span>
    </div>
</div>-->







<div class="form-group col-xs-6 required" id="form-TES_DESCRIPCION-error">
    {!! Form::label("TES_DESCRIPCION","Descripción*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
       <!-- {!! Form::text("TES_DESCRIPCION",null,["class"=>"form-control required"]) !!}-->
            {!! Form::textarea('TES_DESCRIPCION', null, ["class"=>"form-control required","id"=>"focus"]) !!}

        <span id="TES_DESCRIPCION-error" class="help-block"></span>
    </div>
</div>




</div>


                <p class="help-block">- No pueden haber 2 o mas Tesis con igual [Alumno,Año,Semestre]</p>

                                <p class="help-block">- Puede buscar un Alumno por apellido o RUT </p>

                <p class="help-block">- Fijese que no hallan espacios en blanco antes del Nombre </p>



<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('tesis2/list')" class="btn btn-danger"><i
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
                alert('Debe llenar todos los campos requeridos');
            }
        });
        return false;
    });
</script> 


  

<script>
  
      $("#alumno").select2({
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


