@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Pagos</h5>
                        <span>Creación Pagos</span>
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
                            <h5>Registro de Pagos</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nro Expediente</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="images" name="images" required>
                                        <span class="messages"></span>
                                    </div>
                                    <div class="col-sm-2 col-form-label"><button class="btn btn-success waves-effect waves-light btn-sm">Nuevo</button></div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nro Tarjeta</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="images" name="images" required>
                                        <span class="messages"></span>
                                    </div>
                                    <div class="col-sm-2 col-form-label"><button class="btn btn-success waves-effect waves-light btn-sm">Nuevo</button></div>
                                </div>
                                
                            </div>
                            
                            <form id="main" method="POST" action="{{ route('admin.front_add') }}" novalidate="">
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><strong>DATOS DEL TITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"><strong>DEUDAS</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab"><strong>JUSTIFICAR</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="home1" role="tabpanel">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nombre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Direccion</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Grupo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>


                                            </div>

                                        </div>

                                        <div class="tab-pane" id="profile1" role="tabpanel">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nombre de Pagos</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="images" name="images" required>
                                                        <span class="messages">Sin espacios</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Contraseña</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="images" name="images" required>
                                                        <span class="messages">Sin espacios</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                            
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
                                        <a href="{{ route('admin.menu') }}" class="btn btn-sm btn-default m-b-0"><i class="fa fa-reply"></i> Volver</a>
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
@stop