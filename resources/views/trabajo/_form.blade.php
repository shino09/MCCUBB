       <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>

<div class="form-group required" id="form-TRA_NOMBRE-error">
    {!! Form::label("TRA_NOMBRE","Nombre Trabajo*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRA_NOMBRE",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TRA_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-TRA_EMPRESA-error">
    {!! Form::label("TRA_EMPRESA","Empresa*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRA_EMPRESA",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TRA_EMPRESA-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-TRA_CIUDAD-error">
    {!! Form::label("TRA_CIUDAD","Cuidad*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRA_CIUDAD",null,["class"=>"form-control required"]) !!}
        <span id="TRA_CIUDAD-error" class="help-block"></span>
    </div>
</div>



  <p class="help-block">- No pueden haber 2 o mas Trabajos con igual [Nombre,Ciudad,Empresa]</p>

 <p class="help-block">- Fijese que no queden  espacios en blanco antes del Nombre, Ciudad o Empresa</p>






<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('trabajo/list')" class="btn btn-danger"><i
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
