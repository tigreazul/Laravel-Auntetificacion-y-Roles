@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reuniones</h5>
                        <span>Administración de Reuniones</span>
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
                                        <h5>Lista de Reuniones</h5>
                                    </div>
                                    <div class="col-42">
                                        <a href="{{ route('admin.reunion_create') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVO CUOTA</a>
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
                                                <th>Motivo</th>
                                                <th>Lugar</th>
                                                <th>Tipo</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($reunion as $reu)
                                                <tr class="table-verify selector-{{ $reu->idReunion }}">
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $reu->nomReunion }}</td>
                                                    <td>{{ $reu->lugar }}</td>
                                                    <td>{{ $reu->tipo }}</td>
                                                    <td>{{ $reu->fecha }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('admin.cuota_edit', ['id'=>$reu->idReunion]) }}">
                                                                    <i class="fa fa-edit"></i>
                                                                    Editar
                                                                </a>
                                                                <a class="dropdown-item alert-delete" href="#" data-id="{{ $reu->idReunion }}" >
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