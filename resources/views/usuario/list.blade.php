<h1 class="page-header">Usuarios del sistema
   
</h1>
 <div class="pull-right">
        <a href="javascript:ajaxLoad('usuario/create')" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar nuevo usuario</a>
    </div>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('usuario_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('usuario/list')}}?ok=1&search='+this.value)"
                             placeholder="Buscar Usuario por Apellido Paterno o RUT del Usuario"

               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('usuario/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    

       





<tr>
        <th width="50px" style="text-align: center">No</th>
     
   <th>
            <a href="javascript:ajaxLoad('usuario/list?field=rut&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                Rut 
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='rut'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

          <th>
            <a href="javascript:ajaxLoad('usuario/list?field=APELLIDOPATERNO&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                Nombre Usuario
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='APELLIDOPATERNO'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>

       
   


    <th>
            <a href="javascript:ajaxLoad('usuario/list?field=name&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                Email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='name'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
        <!--<th>
            <a href="javascript:ajaxLoad('usuario/list?field=email&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                email
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='email'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->

      <!--<th>
            <a href="javascript:ajaxLoad('usuario/list?field=password&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                password
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='password'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>-->


          <th>
            <a href="javascript:ajaxLoad('usuario/list?field=tipoUsuario&sort={{Session::get("usuario_sort")=="asc"?"desc":"asc"}}')">
                Tipo de Usuario
            </a>
            <i style="font-size: 12px"
               class="fa  {{ Session::get('usuario_field')=='tipoUsuario'?(Session::get('usuario_sort')=='asc'?'fa-sort-alpha-asc ':'fa-sort-alpha-desc '):'' }}">
            </i>
        </th>
      
        <th width="150px"></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($usuarios as $key=>$usuario)
        <tr>
            <td align="center">{{$i++}}</td>

                        <td align="left"> {{$usuario->rut}}</td>





                                                                <td align="left">    <?php echo $usuario->APELLIDOPATERNO;?>           <?php echo $usuario->APELLIDOMATERNO;?>        <?php echo $usuario->name;?>  
</td>


                                                <td align="left"> {{$usuario->email}}</td>

                                              <!--  <td align="right"> {{$usuario->password}}</td>-->
                          <!--  <td align="right"> {{$usuario->tipoUsuario}}</td>-->


<td align="left"> 
                                                <?php if ((0)==($usuario->tipoUsuario))       
                                                     {echo "Secretaria";  }

if ((1)==($usuario->tipoUsuario))              
    {echo "Director";  }
  


  ?>
      
  </td>


            <td style="text-align: center" width="200">

               <a role="button"  class="btn btn-warning  btn-circle" title="Mostrar"
                   href="javascript:ajaxLoad('usuario/show2/{{$usuario->id}}')"><i class="fa fa-eye"></i> 
                     </a> @if(Auth::user()->id != $usuario->id)
              
                       <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:if(confirm('Cambiar los datos del usuario menos contraseña')) ajaxLoad('usuario/update2/{{$usuario->id}}')">
                    <i class="fa fa-list"></i> </a>
                      <a class="btn btn-primary btn-circle" title="Editar"
                   href="javascript:if(confirm('Cambiar los datos del usuario incluyendo la contraseña. Debera ingresar una nueva contraseña para el usuario')) ajaxLoad('usuario/update/{{$usuario->id}}')">
                    <i class="fa fa-list"></i> </a>

                <a class="btn btn-danger btn-circle" title="Eliminar"
                   href="javascript:if(confirm('¿Esta seguro que quiere eliminar este registro?')) ajaxLoad('usuario/delete/{{$usuario->id}}')">
                    <i class="fa fa-times"></i> 
                </a>
                                                        @endif

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$usuarios->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$usuarios->total()}} registros
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script> 
