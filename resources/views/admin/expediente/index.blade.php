@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Expediente</h5>
                        <span>Administración de Expediente</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- card -->
                    <div class="row">
                        <div class="card panel-modulo col " style="margin-right: 15px;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5>Lista de Expediente</h5>
                                    </div>
                                    <div class="col-42">
                                        <a href="{{ route('admin.expe_create') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVO EXPEDIENTE</a>
                                    </div>                                
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <!-- lista de tablas -->
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Número Expediente</th>
                                                <th>Nùmero de Padrón</th>
                                                <th>Grupo</th>
                                                <th>Estado</th>
                                                <th>Area</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($expediente as $exp)
                                                <tr class="table-verify selector-{{ $exp->idExpediente }}">
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $exp->nroExpediente }}</td>
                                                    <td>{{ $exp->nroPadron }}</td>
                                                    <td>{{ $exp->nomGrupo }}</td>
                                                    <td><label class="label label-{{ ($exp->estado == 1)? 'success': 'danger' }}">Activo</label></td>
                                                    <td>{{ $exp->area }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('admin.expe_edit', ['id'=>$exp->idExpediente]) }}">
                                                                    <i class="fa fa-edit"></i>
                                                                    Editar
                                                                </a>
                                                                <!-- <a class="dropdown-item alert-delete" href="#" data-id="{{ $exp->idExpediente }}" >
                                                                    <i class="fa fa-trash-alt"></i>
                                                                    Eliminar
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- lista de tablas -->
                                    <div class="table-responsive">
                                    </div>
                                    <div class="card-block p-b-0">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card panel-pagina col" style="display:none">
                        <!-- <div class="card panel-pagina col" style=""> -->
                            @include('admin.configuracion.pagina')
                        </div>


                    </div>
                    <div class="md-overlay"></div>
                    <!-- card -->
                </div>
            </div>
        </div>
    </div>


@stop