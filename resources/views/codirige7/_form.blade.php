
                <p class="help-block">Creando </p>

   <div >

<b>RUT Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->id ?> 

</div>
   <div >

<b>Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</div>

   <div >

<b>Id Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->id ?> 

</div>
  <div >

<b>Nombre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_NOMBRE ?> 

</div>
 <div >

<b>Descripción Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_DESCRIPCION ?> 

</div>
  <div >

<b>Año Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_ANO ?> 

</div>
 <div >

<b>Semestre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_SEMESTRE ?> 

</div>

  
   <div >

<b>RUT Profesor Guia:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor->id ?> 

</div>
   <div >

<b>Profesor Guia:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor->PRO_NOMBRES ?>  <?php echo $profesor->PRO_PATERNO ?>  <?php echo $profesor->PRO_MATERNO ?>


</div>

    <br>
    <br>


<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","TESIS *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",$id,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
</div>


<div class="form-group col-xs-6 required" id="form-VIS_UNIVERSIDAD-error">
    {!! Form::label("PROFESOR_id","PROFESOR *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("PROFESOR_id",$PROFESOR_id,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="VIS_UNIVERSIDAD-error" class="help-block"></span>
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('codirige7/list')" class="btn btn-danger"><i
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
