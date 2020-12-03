<div class="form-group required" id="form-name-error">
    {!! Form::label("name","Name",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("name",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="name-error" class="help-block"></span>
    </div>
</div>
<div class="form-group required" id="form-apellido-error">
    {!! Form::label("apellido","apellido",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("apellido",null,["class"=>"form-control required"]) !!}
        <span id="apellido-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-email-error">
    {!! Form::label("email","email",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("email",null,["class"=>"form-control required", "readonly"]) !!}
        <span id="email-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-DEP_ID-error">
    {!! Form::label("DEP_ID","DEP_ID",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("DEP_ID",null,["class"=>"form-control required"]) !!}
        <span id="DEP_ID-error" class="help-block"></span>
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('contrato4/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
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
