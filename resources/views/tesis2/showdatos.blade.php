<div class="box-body col-xs-12">

<div class="form-group  col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("id","Id",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_NOMBRE","Nombre",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_NOMBRE",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>




<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_ANO","TES_ANO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_ANO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>




<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_DESCRIPCION","TES_DESCRIPCION",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_DESCRIPCION",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_SEMESTRE","TES_SEMESTRE",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_SEMESTRE",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_FECHAINICIO","TES_FECHAINICIO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_FECHAINICIO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_FECHAFINAL","TES_FECHAFINAL",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_FECHAFINAL",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("TES_ESTADO","TES_ESTADO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TES_ESTADO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-TES_NOMBRE-error">
    {!! Form::label("ALUMNO_id","ALUMNO_id",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("ALUMNO_id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="TES_NOMBRE-error" class="help-block"></span>
    </div>
</div>


</div>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('tesis2/list')" class="btn btn-danger"><i
                    class="fa fa-backward"></i>
            Atras</a>
      
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
