  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profesores</title>

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






<div class="form-group col-xs-6 required" id="form-PRO_NOMBRES-error">
    {!! Form::label("PRO_NOMBRES","Nombre*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_NOMBRES",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="PRO_NOMBRES-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-PRO_GRADO-error">
    {!! Form::label("PRO_GRADO","Grado*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_GRADO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_GRADO-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-PRO_PATERNO-error">
    {!! Form::label("PRO_PATERNO","Paterno*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_PATERNO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_PATERNO-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-PRO_EMAIL-error">
    {!! Form::label("PRO_EMAIL","Email*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_EMAIL",null,["class"=>"form-control required"]) !!}
        <span id="PRO_EMAIL-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-PRO_MATERNO-error">
    {!! Form::label("PRO_MATERNO","Materno*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_MATERNO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_MATERNO-error" class="help-block"></span>
    </div>
</div>






<div class="form-group col-xs-6 required" id="form-PRO_TELEFONO-error">
    {!! Form::label("PRO_TELEFONO","Telefono*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_TELEFONO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_TELEFONO-error" class="help-block"></span>
    </div>
</div>





<div class="form-group col-xs-6 required" id="form-PRO_TITULO-error">
    {!! Form::label("PRO_TITULO","Titulo*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_TITULO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_TITULO-error" class="help-block"></span>
    </div>
</div>




<div class="form-group col-xs-10 " required" id="form-departamento-error">
    {!! Form::label("DEPARTAMENTO_id","Departamento*",["class"=>"control-label col-md-2"]) !!}
    <div class="col-md-10" >
     

            {!! Form::select('DEPARTAMENTO_id',$DEPARTAMENTO,null,['id'=>'departamento','class'=>'js-example-responsive','style'=>'width: 50%']) !!}   


        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


</div>

  <p class="help-block">-Email debe ser valido</p>

                <p class="help-block">-Email debe ser unicos</p>

             <p class="help-block">- Fijese que no queden  espacios en blanco antes del RUT y el Email</p>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('profesor/list')" class="btn btn-danger"><i
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
  
      $("#departamento").select2({
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


