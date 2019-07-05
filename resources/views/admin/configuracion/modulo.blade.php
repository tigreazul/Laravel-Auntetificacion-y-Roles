@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Menu</h5>
                        <span>Administración de menus</span>
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

    <!-- <pre>
        <?php // print_r($data); ?>
    </pre> -->


    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5>Lista de datos</h5>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVO</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                                <!-- lista de tablas -->
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($data as $res)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{!! $res->Icono !!} {{ $res->Titulo }}</td>
                                                <td>{{ $res->Descripcion }}</td>
                                                <td><label class="label label-{{ ($res->Estado == 1)? 'success': 'danger' }}">Activo</label></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Acciones
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('admin.modulo_edit', $res) }}">
                                                                <i class="fa fa-edit"></i>
                                                                Editar
                                                            </a>
                                                            <a class="dropdown-item" href="#">
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
                            <div class="dt-responsive table-responsive">
                                <div class="table-responsive">
                                </div>
                                <div class="card-block p-b-0">
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- card -->
                </div>
            </div>
        </div>
    </div>
@stop