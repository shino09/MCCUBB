                <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>






<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","PROFESOR *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
     <!-- <a role="button"  class="btn btn-success  btn-circle" 
                   href="javascript:if(confirm('¿Quiere que ese profesor dirija una TRIBUNAL?')) ajaxLoad('conforman17/list3/{{$TRIBUNAL_id}}')">D 
                     </a>-->


                       <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript:ajaxLoad('conforman17/list2update/{{$id}}/{{$TRIBUNAL_id}}')">
                    <i class="fa fa-list"></i> </a>
</div>






<div class="form-group col-xs-6 required" id="form-VIS_UNIVERSIDAD-error">
    {!! Form::label("TRIBUNAL_id","TRIBUNAL *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRIBUNAL_id",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="VIS_UNIVERSIDAD-error" class="help-block"></span>
    </div>
     <a role="button"  class="btn btn-primary  btn-circle" 
                   href="javascript:ajaxLoad('conforman17/list3update/{{$id}}/{{$TRIBUNAL_id}}')"><i class="fa fa-list"></i> 
                     </a>
</div>




<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('conforman17/list')" class="btn btn-danger"><i
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
