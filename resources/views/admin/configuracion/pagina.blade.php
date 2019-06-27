<div class="card-header">
    <div class="row">
        <div class="col">
            <h5>Lista de pagina -</h5>
        </div>
    </div>
</div>
<div class="card-block">
    <table class="table table-hover m-b-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Route</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($pagina as $pag)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $pag->Descripcion }}</td>
                    <td><code>{{ $pag->Ruta }}</code></td>
                    <td><label class="label label-{{ ($pag->Estado == 1)? 'success': 'danger' }}">Activo</label></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.modulo_edit', ['id'=>$pag->ID]) }}">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                                <a class="dropdown-item alert-delete" href="#" data-id="{{ $pag->ID }}" >
                                    <i class="fa fa-trash-alt"></i>
                                    Eliminar
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>