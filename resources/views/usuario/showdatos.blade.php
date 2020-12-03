

<div class="form-group required" id="form-name-error">
    {!! Form::label("id","Id",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-name-error">
    {!! Form::label("name","Nombre",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-APELLIDOPATERNO-error">
    {!! Form::label("APELLIDOPATERNO","NoAPELLIDOPATERNO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("APELLIDOPATERNO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-APELLIDOMATERNO-error">
    {!! Form::label("APELLIDOMATERNO","APELLIDOMATERNO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("APELLIDOMATERNO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-departamento-error">
    {!! Form::label("rut","rut",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("rut",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-departamento-error">
    {!! Form::label("email","email",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("email",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-departamento-error">
    {!! Form::label("password","password",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("password",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-departamento-error">
    {!! Form::label("tipoUsuario","tipoUsuario",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("tipoUsuario",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="departamento-error" class="help-block"></span>
    </div>
</div>





<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('usuario/list')" class="btn btn-danger"><i
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
