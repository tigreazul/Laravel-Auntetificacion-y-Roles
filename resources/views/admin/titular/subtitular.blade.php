<button type="button" class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#default-Modal">Nuevo</button>
<br>

<div class="card-block loader-cards">
    <table class="table table-hover m-b-0">
        <thead>
            <tr>
                <th>#</th>
                <!-- <th>Nro</th> -->
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Ocupación</th>
                <th>Distrito</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody  id="subtitular-body-table">
            @php $i = 1; @endphp
            @forelse($subtitular as $sub)
                <tr class="table-verify selector-{{ $sub->idSubtitular }}">
                    <td>{{ $i }}</td>
                    <td>{{ $sub->nombre }}</td>
                    <td>{{ $sub->apellidoPaterno.' '.$sub->apellidoMaterno }}</td>
                    <td>{{ $sub->dni }}</td>
                    <td>{{ $sub->ocupacion }}</td>
                    <td>{{ $sub->departamento.' / '.$sub->provincia.' / '.$sub->distrito }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.modulo_edit', ['id'=>$sub->idSubtitular]) }}">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                                <a class="dropdown-item alert-delete" href="#" data-id="{{ $sub->idSubtitular }}" >
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

    $(document).on('change','#dep',function(e){
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
                $("#prov").removeAttr('disabled');
                $('#prov').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.provID+'" data-id="'+element.provID+'">'+element.descripcion+'</option>'
                });
                $('#prov').html(vhtml);
                $('#dist').html('<option value="">[SELECCIONE]</option>');
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });

    $(document).on('change','#prov',function(e){
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
                $("#dist").removeAttr('disabled');
                $('#dist').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.distID+'" data-id="'+element.distID+'">'+element.descripcion+'</option>'
                });
                $('#dist').html(vhtml);
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });

</script>