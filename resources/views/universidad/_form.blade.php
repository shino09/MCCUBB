       <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>

<div class="form-group required" id="form-UNI_NOMBRE-error">
    {!! Form::label("UNI_NOMBRE","Nombre Universidad*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("UNI_NOMBRE",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="UNI_NOMBRE-error" class="help-block"></span>
    </div>
</div>
<div class="form-group required" id="form-UNI_CIUDAD-error">
    {!! Form::label("UNI_CIUDAD","Ciudad*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("UNI_CIUDAD",null,["class"=>"form-control required"]) !!}
        <span id="UNI_CIUDAD-error" class="help-block"></span>
    </div>
</div>



  <p class="help-block">- No pueden haber 2 o mas Universidades con igual [Nombre,Ciudad]</p>

 <p class="help-block">- Fijese que no queden  espacios en blanco antes del Nombre y Ciudad</p>



<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('universidad/list')" class="btn btn-danger"><i
                    class="fa fa-times"></i>
            Cancelar</a>
        {!! Form::button("<i class='fa fa-save'></i> Guardad",["type" => "submit","class"=>"btn
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
