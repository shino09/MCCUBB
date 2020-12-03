


                <p class="help-block">Creando</p>

   



<div class="box-body col-xs-12">
<div class="col-xs-6">
 <b>RUT Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->id ?> 

</div>

<div class="col-xs-6">

<b>RUT Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->id ?> 

</div>
<div class="col-xs-6">

<b>Alumno:</b>&nbsp;&nbsp;&nbsp; <?php echo $alumno->ALU_NOMBRES ?>  <?php echo $alumno->ALU_PATERNO ?>  <?php echo $alumno->ALU_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Profesor Dirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesordirige->PRO_NOMBRES ?>  <?php echo $profesordirige->PRO_PATERNO ?>  <?php echo $profesordirige->PRO_MATERNO ?>


</div>

<div class="col-xs-6">

<b>Id Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->id ?> 

</div>
<div class="col-xs-6">

<b>RUT Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->id ?> 

</div>
<div class="col-xs-6">

<b>Nombre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_NOMBRE ?> 

</div>
<div class="col-xs-6">

<b>Profesor 1:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor1->PRO_NOMBRES ?>  <?php echo $profesor1->PRO_PATERNO ?>  <?php echo $profesor1->PRO_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Descripción Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_DESCRIPCION ?> 

</div>
<div class="col-xs-6">

<b>RUT Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->id ?> 

</div>
<div class="col-xs-6">

<b>Año Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_ANO ?> 

</div>
<div class="col-xs-6">

<b>Profesor 2:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor2->PRO_NOMBRES ?>  <?php echo $profesor2->PRO_PATERNO ?>  <?php echo $profesor2->PRO_MATERNO ?>


</div>
<div class="col-xs-6">

<b>Semestre Tesis:</b>&nbsp;&nbsp;&nbsp; <?php echo $tesis->TES_SEMESTRE ?> 

</div>








<div class="col-xs-6">

<b>RUT Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->id ?> 

</div>

<div class="col-xs-6">


</div>
<div class="col-xs-6">

<b>Profesor 3:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor3->PRO_NOMBRES ?>  <?php echo $profesor3->PRO_PATERNO ?>  <?php echo $profesor3->PRO_MATERNO ?>


</div>


<?php if (($concodirige==1)) { ?>    
<div class="col-xs-6"></div>

    <div class="col-xs-6">

<b>RUT Profesor Codirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesorcodirige->id ?> 

</div>
<div class="col-xs-6">
</div>
<div class="col-xs-6">

<b>Profesor Codirige:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesorcodirige->PRO_NOMBRES ?>  <?php echo $profesorcodirige->PRO_PATERNO ?>  <?php echo $profesorcodirige->PRO_MATERNO ?>


</div>
          <?php } ?>
    </div>

<br>
<br>

<br>
<br>

<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","Tesis *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",$id,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
</div>

<div class="form-group col-xs-6 required" id="form-idguia-error">
    {!! Form::label("idguia","PROFESOR 1*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("idguia",$idguia,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="idguia-error" class="help-block"></span>
    </div>
</div>



<div class="form-group col-xs-6 required" id="form-idinformante-error">
    {!! Form::label("idinformante","PROFESOR 2 *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("idinformante",$idinformante,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="idinformante-error" class="help-block"></span>
    </div>
</div>




<div class="form-group col-xs-6 required" id="form-idsala-error">
    {!! Form::label("idsala","PROFESOR 3 *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("idsala",$idsala,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="idsala-error" class="help-block"></span>
    </div>
</div>









<div class="form-group">
    <div class="col-md-12 col-md-push-3">
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
               // alert('Esta Tesis ya tiene un tribunal evaluador conformado');
                               alert(errorThrown);

            }
        });
        return false;
    });
</script> 
