
                <p class="help-block">Modificando </p>

   <div >

<b>RUT Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->id ?> 

</div>
   <div >

<b>Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</div>

<div >
     <b> Id Trabajo:</b>&nbsp;&nbsp;&nbsp; <?php echo  $trabajo->id ?>

    </div>
    <div >
     <b> Nombre del Trabajo:</b>&nbsp;&nbsp;&nbsp; <?php echo  $trabajo->TRA_NOMBRE ?>

    </div>
   
    <div >
     <b> Empresa Trabajo:</b>&nbsp;&nbsp;&nbsp; <?php echo  $trabajo->TRA_EMPRESA ?>

    </div>
     <div >
     <b> Ciudad Trabajo:</b>&nbsp;&nbsp;&nbsp; <?php echo  $trabajo->TRA_CIUDAD ?>

    </div>

                <p class="help-block">-Aprete el boton azul si desea editar el campo</p>




<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","Alumno *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",$id,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
     <!-- <a role="button"  class="btn btn-primary  btn-circle" 
                   href="javascript:if(confirm('¿Quiere que ese profesor dirija una tesis?')) ajaxLoad('tiene3/list3/{{$TRABAJO_id}}')">D 
                     </a><i class="fa fa-list"></i> </a>-->


                       <a class="btn btn-primary btn-circle" title="Edit"
                   href="javascript: ajaxLoad('tiene3/list2update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')">
                    <i class="fa fa-list"></i> </a>
</div>




<div class="form-group col-xs-6 required" id="form-VIS_UNIVERSIDAD-error">
    {!! Form::label("TRABAJO_id","TRABAJO *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TRABAJO_id",$TRABAJO_id,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="VIS_UNIVERSIDAD-error" class="help-block"></span>
    </div>
     <a role="button"  class="btn btn-primary  btn-circle" 
                   href="javascript: ajaxLoad('tiene3/list3update/{{$id}}/{{$TRABAJO_id}}/{{$idviejo}}/{{$TRABAJO_idviejo}}')"><i class="fa fa-list"></i> </a>
                     </a>
</div>





<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('tiene3/list')" class="btn btn-danger"><i
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
