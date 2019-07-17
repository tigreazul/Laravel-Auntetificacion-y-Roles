@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Cuota</h5>
                        <span>Creación Cuota</span>
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
                            <h5>Registro de Cuota</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.front_add') }}" novalidate="">
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><strong>DATOS DE LA CUOTA</strong></a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="home1" role="tabpanel">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nro</label>
                                                        <div class="col-sm-9">
                                                            <select name="" class="form-control" id="">
                                                                <option value="">[SELECCIONE]</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Año</label>
                                                        <div class="col-sm-9">
                                                            <select name="" class="form-control" id="">
                                                                <option value="">[SELECCIONE]</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <table class="table table-hover m-b-0 col-sm-6">
                                                <thead>
                                                    <tr>
                                                        <th>Nro</th>
                                                        <th>Periodos</th>
                                                        <th>Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>ENERO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>FEBRERO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>MARZO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>ABRIL</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>MAYO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>JUNIO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>JULIO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>AGOSTO</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>SEPTIEMBRE</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>OCTUBRE</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>NOVIEMBRE</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>DICIEMBRE</td>
                                                        <td><input type="text"></td>
                                                    </tr>
                                                </tbody>
                                            </table>


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