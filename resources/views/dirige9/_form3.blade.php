                <p class="help-block">Campos con <span class="required">*</span> son obligatorios</p>









                <p class="help-block">-Aprete el boton azul si desea editar el campo</p>



<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","TESIS *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",$id,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
     <!-- <a role="button"  class="btn btn-primary  btn-circle" 
                   href="javascript:if(confirm('¿Quiere que ese profesor dirija una tesis?')) ajaxLoad('dirige9/list3/{{$NUCLEO_id}}')">D 
                     </a><i class="fa fa-list"></i> </a>-->


                       <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript: ajaxLoad('dirige9/list2update/{{$id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')">
                    <i class="fa fa-list"></i> </a>
</div>

<div class="form-group col-xs-6 required" id="form-VIS_UNIVERSIDAD-error">
    {!! Form::label("NUCLEO_id","PROFESOR *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("NUCLEO_id",$NUCLEO_id,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="VIS_UNIVERSIDAD-error" class="help-block"></span>
    </div>
     <a role="button"  class="btn btn-primary  btn-circle" 
                   href="javascript: ajaxLoad('dirige9/list3update/{{$id}}/{{$NUCLEO_id}}/{{$idviejo}}/{{$NUCLEO_idviejo}}')"><i class="fa fa-list"></i> </a>
                     </a>
</div>





<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('dirige9/list')" class="btn btn-danger"><i
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
