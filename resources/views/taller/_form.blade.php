       <p class="help-block"><span style="color:#FF0000"> Campos con <span class="required">asterisco (*)</span>  son obligatorios </p>

<div class="form-group required" id="form-TAL_NOMBRE-error">
    {!! Form::label("TAL_NOMBRE","Nombre del Taller*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TAL_NOMBRE",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TAL_NOMBRE-error" class="help-block"></span>
    </div>
</div>


<div class="form-group required" id="form-TAL_ANO-error">
    {!! Form::label("TAL_ANO","Año*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("TAL_ANO",null,["class"=>"form-control required","id"=>"focus"]) !!}
        <span id="TAL_ANO-error" class="help-block"></span>
    </div>
</div>




<!--<div class="form-group   required" id="form-TAL_ANO-error">
    {!! Form::label("TAL_ANO","Año*",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
 {!! Form::select('TAL_ANO', ['1990' => '1990','1991' => '1991','1992' => '1992','1993' => '1993','1994' => '1994','1995' => '1995','1996' => '1996','1997' => '1997','1998' => '1998','1999' => '1999','2000' => '2000','2001' => '2001','2002' => '2002','2003' => '2003','2004' => '2004','2005' => '2005','2006' => '2006','2007' => '2007','2008' => '2008','2009' => '2009','2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029','2030' => '2030' ],null,['required', 'class' => 'form-control','placeholder'=>'Selecione Año']) !!}        <span id="TAL_ANO-error" class="help-block"></span>
    </div>
</div>-->

   <p class="help-block">- No pueden haber 2 o mas Talleres con igual [Nombre,Año]</p>

                <p class="help-block">- Año debe ser un numero entero</p>

 <p class="help-block">- Fijese que no queden  espacios en blanco antes del Nombre</p>


<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('taller/list')" class="btn btn-danger"><i
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
