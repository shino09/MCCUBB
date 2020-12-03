

       <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>

             
<div class="form-group required" id="form-rut-error">
    {!! Form::label("rut","RUT*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("rut",null,["class"=>"form-control required"]) !!}
        <span id="rut-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-name-error">
    {!! Form::label("name","Nombre *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>



<div class="form-group required" id="form-APELLIDOPATERNO-error">
    {!! Form::label("APELLIDOPATERNO","Apellido Paterno *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("APELLIDOPATERNO",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="APELLIDOPATERNO-error" class="help-block"></span>
    </div>
</div>



<div class="form-group required" id="form-APELLIDOMATERNO-error">
    {!! Form::label("APELLIDOMATERNO","Apellido Materno*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("APELLIDOMATERNO",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="APELLIDOMATERNO-error" class="help-block"></span>
    </div>
</div>

{!! Form::token() !!}




<div class="form-group required" id="form-email-error">
    {!! Form::label("email","Email*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("email",null,["class"=>"form-control required"]) !!}
        <span id="email-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-password-error">
    {!! Form::label("password","Contraseña*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::password("password",null,["class"=>"form-control required"]) !!}
        <span id="password-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-password_confirmation-error">
    {!! Form::label("password_confirmation","Confirme Contraseña*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::password("password_confirmation",null,["class"=>"form-control required"]) !!}
        <span id="password_confirmation-error" class="help-block"></span>
    </div>
</div>


<!--
<div class="form-group required" id="form-tipoUsuario-error">
    {!! Form::label("tipoUsuario","tipoUsuario*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
{!!Form::select('tipoUsuario', ['0' => 'Secretaria','1' => 'Administrador' ], null, ['placeholder' => 'Pick a size...'])!!}
        <span id="tipoUsuario-error" class="help-block"></span>
    </div>
</div>-->



<div class="form-group required" id="form-tipoUsuario-error">
    {!! Form::label("tipoUsuario","Tipo de Usuario*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
     

            {!! Form::select('tipoUsuario', ['0' => 'Secretaria','1' => 'Director' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione tipoUsuario']) !!}

        <span id="tipoUsuario-error" class="help-block"></span>
    </div>
</div>


 

                   <p class="help-block"><span class="required">-</span>Rut y Email deben ser validos </p>

        <p class="help-block"><span class="required">-</span>Contraseña debe contener 6 o más caracteres </p>
        <p class="help-block"><span class="required">-</span>No deje espacios en blanco antes del RUT ni el Email </p>







<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('usuario/list')" class="btn btn-danger"><i
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
