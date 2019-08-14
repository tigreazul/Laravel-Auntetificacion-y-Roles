<button type="button" class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modal-habitan">Nuevo</button>
<!-- <a class="btn btn-success waves-effect waves-light btn-sm" >Nuevo</a> -->
<br>
<div class="card-block loader-cards">

    <table class="table table-hover m-b-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Ocupación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody  id="habitan-body-table">
            @php $i = 1; @endphp
            @forelse($hijos as $hogar)
                <tr class="table-verify selector-{{ $hogar->idMiembro }}">
                    <td>{{ $i }}</td>
                    <td>{{ $hogar->nombre }}</td>
                    <td>{{ $hogar->apellidoPaterno.' '.$hogar->apellidoMaterno }}</td>
                    <td>{{ $hogar->dni }}</td>
                    <td>{{ $hogar->relacion }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.modulo_edit', ['id'=>$hogar->idMiembro]) }}">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                                <a class="dropdown-item alert-delete" href="#" data-id="{{ $hogar->idMiembro }}" >
                                    <i class="fa fa-trash-alt"></i>
                                    Eliminar
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @php $i++; @endphp
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">NO EXISTE REGISTRO</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


<script type="text/javascript">

    $(document).on('change','#depHi',function(e){
        e.preventDefault();
        let code = $(this).find(':selected').data('id');
        console.log(code); 
        // return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url     : app.base+'/provincia/'+code,
            type    : 'GET',
            dataType: 'JSON',
            data    : {},
            success : function(data){
                $("#provHi").removeAttr('disabled');
                $('#provHi').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.provID+'" data-id="'+element.provID+'">'+element.descripcion+'</option>'
                });
                $('#provHi').html(vhtml);
                $('#distHi').html('<option value="">[SELECCIONE]</option>');
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });

    $(document).on('change','#provHi',function(e){
        e.preventDefault();
        let code = $(this).find(':selected').data('id');
        console.log(code); 
        // return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url     : app.base+'/distrito/'+code,
            type    : 'GET',
            dataType: 'JSON',
            data    : {},
            success : function(data){
                $("#distHi").removeAttr('disabled');
                $('#distHi').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.distID+'" data-id="'+element.distID+'">'+element.descripcion+'</option>'
                });
                $('#distHi').html(vhtml);
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });

</script>