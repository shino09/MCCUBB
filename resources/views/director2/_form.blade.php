

       
                <p class="help-block">Creando </p>



   <div >

<b>RUT Profesor:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor->id ?> 

</div>
   <div >

<b>Profesor:</b>&nbsp;&nbsp;&nbsp; <?php echo $profesor->PRO_NOMBRES ?>  <?php echo $profesor->PRO_PATERNO ?>  <?php echo $profesor->PRO_MATERNO ?>


</div>

    <br>
    <br>


<div class="box-body col-xs-12">

<div class="form-group col-xs-6 required" id="form-id-error">
    {!! Form::label("id","RUT *",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("id",null,["class"=>"form-control required","id"=>"focus","readonly"]) !!}
        <span id="id-error" class="help-block"></span>
    </div>
</div>

</div>

                <p class="help-block">-Un Profesor puede ser solo de un tipo [Director,Nucle,Colaborador,Visitante] </p>


    
         <br>
         <br>

<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('profesor3/list')" class="btn btn-danger"><i
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
