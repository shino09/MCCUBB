                <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>


<div class="box-body col-xs-12">

<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","RUT *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-PRO_TITULO-error">
    {!! Form::label("PRO_TITULO","Titulo*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PRO_TITULO",null,["class"=>"form-control required"]) !!}
        <span id="PRO_TITULO-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-PRO_NOMBRES-error">
    {!! Form::label("PRO_NOMBRES","Nombres *",["class"=>"control-label col-md-3"]) !!}
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
    {!! Form::label("PRO_PATERNO","Ape Paterno*",["class"=>"control-label col-md-3"]) !!}
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
    {!! Form::label("PRO_MATERNO","Ape Materno*",["class"=>"control-label col-md-3"]) !!}
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






<div class="form-group col-xs-6 required" id="form-DEPARTAMENTO-error">
    {!! Form::label("DEPARTAMENTO_DEP_ID","Departamento*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('DEPARTAMENTO_DEP_ID', $DEPARTAMENTO,null,['required', 'class' => 'form-control','placeholder'=>'Selecione DEPARTAMENTO']) !!}

        <span id="DEPARTAMENTO-error" class="help-block"></span>
    </div>
</div>





<!--<div class="form-group required" id="form-departamento-error">
    {!! Form::label("DEPARTAMENTO_DEP_ID","Departamento*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        <!-- {!! Form::text("DEPARTAMENTO_id",null,["class"=>"form-control required"]) !!}-->
            <!--{!!Form::select('DEPARTAMENTO_DEP_ID',$DEPARTAMENTO)!!}

        <span id="departamento-error" class="help-block"></span>
    </div>
</div>-->






</div>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('profesor3/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
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
