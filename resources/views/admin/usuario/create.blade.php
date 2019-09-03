@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Usuario</h5>
                        <span>Creación Usuario</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- card -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Registro de Usuario</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.user_add') }}" >
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><strong>DATOS DEL USUARIO</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"><strong>DATOS DE ACCESO</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab"><strong>DATOS DE GESTIÓN</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="home1" role="tabpanel">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nombre" name="nombre" required onkeypress="return soloLetras(event)">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Apellido Paterno</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="apaterno" name="apaterno" required onkeypress="return soloLetras(event)">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Apellido Materno</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="amaterno" name="amaterno" required onkeypress="return soloLetras(event)">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="fnacimiento" name="fnacimiento" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">DNI</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="dni" maxlength="8" name="dni" required onKeyPress="return soloNumeros(event)">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>

                                        <div class="tab-pane" id="profile1" role="tabpanel">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nombre de Usuario</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="Usuario" name="usuario" required>
                                                        <!-- <span class="messages">Sin espacios</span> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Contraseña</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                        <!-- <span class="messages">Sin espacios</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Cargo</label>
                                                    <div class="col-sm-10">
                                                        <select name="cargo" class="form-control" id="cargo">
                                                            <option value="">[SELECCIONE]</option>
                                                            @foreach($cargo as $carg)
                                                                <option value="{{ $carg->codigo }}" data-id="{{ $carg->codigo }}">{{ $carg->valor }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Año de inicio de gestión</label>
                                                    <div class="col-sm-10">
                                                        <select name="agestion" class="form-control" id="agestion">
                                                            <option value="">[SELECCIONE]</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>


                                
                                <div class="form-group row">
                                    <hr>
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-sm btn-primary m-b-0">
                                                <i class="fa fa-save"></i> Registrar
                                        </button>
                                        <a href="{{ route('admin.user_list') }}" class="btn btn-sm btn-default m-b-0"><i class="fa fa-reply"></i> Volver</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        // $('body').addClass('wysihtml5-supported');
    </script>
    <script src="{{ asset('js/titular.js') }}"></script>
@stop