@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Reporte</h5>
                        <span>Expediente</span>
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
                                        <h5>Lista de Reporte</h5>
                                    </div>                         
                                </div>
                            </div>
                            <div class="card-block">

                                <form id="mains" method="POST" action="{{ route('admin.expediente_search') }}" >
                                    @csrf
                                    <div class="col-sm-8" style="margin-left: 16%;">
                                        <div class="form-group row">
                                            <div class="input-group input-group-button ">
                                                <input type="text" class="form-control" name="buscador" placeholder="Ingresar Numero de expediente">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                                </div>
                                            </div>
                                            <span class="messages" style="color: red;font-size: 12px;">
                                                @if (Session::has('message'))
                                                    {!! session('message') !!}
                                                @endif
                                            </span>
                                        </div>

                                    </div>
                                </form>
                                <hr>

                                <div class="dt-responsive table-responsive">
                                    <!-- lista de tablas -->
                                    <div class="col-3 offset-md-1 mb-1">
                                        <button class="btn btn-primary btn-sm" type="submit">Imprimir</button>
                                    </div>

                                    <table class="table table-hover m-b-0" style="width: 82%;margin: 0 auto;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nro Expediente</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Dirección</th>
                                                <th>Grupo</th>
                                                <th>Manzana</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp

                                            @forelse($buscardor as $search)
                                                <tr class="table-verify selector-{{ $search->idExpediente }}">
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $search->nroExpediente }}</td>
                                                    <td>{{ $search->apellidoPaterno.' '.$search->apellidoMaterno.' '.$search->nombre }}</td>
                                                    <td>{{ $search->nomDireccion }}</td>
                                                    <td><code>{{ $search->nomDireccion }}</code></td>
                                                    <td>{{ $search->nomGrupo }}</td>
                                                    <td>{{ $search->nomManzana }}</td>
                                                </tr>
                                                @php $i++; @endphp
                                            @empty
                                                <tr>
                                                    <td colspan="6" style="text-align:center; background:#f4f6f7"> <strong>NO EXISTE RESULTADOS</strong></td>
                                                </tr>
                                            @endforelse
                                            
                                        </tbody>
                                    </table>
                                    <!-- lista de tablas -->
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="md-overlay"></div>
                    <!-- card -->
                </div>
            </div>
        </div>
    </div>


@stop