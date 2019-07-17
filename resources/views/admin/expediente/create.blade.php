@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Expediente</h5>
                        <span>Creación Expediente</span>
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
                            <h5>Registro de Expediente</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.front_add') }}" novalidate="">
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><strong>DATOS DEL TERRENO</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"><strong>DIRECCION</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab"><strong>VIVIENDA</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings1" role="tab"><strong>DESARROLLO DE LA VIVIENDA</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings2" role="tab"><strong>APARATOS ELECTRICOS</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="home1" role="tabpanel">

                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nro Expediente</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nro de Padrón</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Area</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Grupo</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="images" name="images" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    
                                                    <div style="width: 100%;height: 200px;border: 1px solid #b3b3b3;margin: 7px;background: #efefef;">
                                                            <p style="padding-top: 84px;text-align: center;color: #c5c5c5;">SIN IMAGEN</p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Subir imagen</label>
                                                        <div class="col-sm-9">
                                                            <div class="btn btn-primary btn-sm">Seleccione</div>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>



                                        </div>

                                        <div class="tab-pane" id="profile1" role="tabpanel">
                                            <button class="btn btn-success waves-effect waves-light btn-sm">Nuevo</button>
                                            <br>
                                            <table class="table table-hover m-b-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nro</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>DNI</th>
                                                        <th>Ocupacion</th>
                                                        <th>Distrito</th>
                                                    </tr>
                                                </thead>
                                                <tbody  id="page-body-table">
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="messages1" role="tabpanel">
                                            <button class="btn btn-success waves-effect waves-light btn-sm">Nuevo</button>
                                                <br>
                                                <table class="table table-hover m-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nro</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
                                                            <th>DNI</th>
                                                            <th>Ocupacion</th>
                                                            <th>Distrito</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  id="page-body-table">
                                                    
                                                    </tbody>
                                                </table>
                                        </div>
                                        <div class="tab-pane" id="settings1" role="tabpanel">
                                            
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