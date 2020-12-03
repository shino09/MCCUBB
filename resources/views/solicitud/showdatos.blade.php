
<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("id","Id",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>



<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("SOL_NOMBRE","Nombre",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_NOMBRE",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>




<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("SOL_ANO","SOL_ANO",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_ANO",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("SOL_SEMESTRE","SOL_SEMESTRE",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_SEMESTRE",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>

<div class="form-group required" id="form-SOL_NOMBRE-error">
    {!! Form::label("SOL_DESCRIPCION","SOL_DESCRIPCION",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("SOL_DESCRIPCION",null,["class"=>"form-control required","id"=>"focus", "readonly"]) !!}
        <span id="SOL_NOMBRE-error" class="help-block"></span>
    </div>
</div>




<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('solicitud/list')" class="btn btn-danger"><i
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
                        index = $(this).attr('NAME');
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
