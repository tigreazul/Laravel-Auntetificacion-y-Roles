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
                            <form id="main" method="POST" action="{{ route('admin.cuota_add') }}" novalidate="">
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
                                                        <label class="col-sm-3 col-form-label">Tipo Cuota</label>
                                                        <div class="col-sm-9">
                                                            <select name="tipo_cuota" class="form-control" id="tipo_cuota">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($tcuota as $cuota)
                                                                    <option value="{{ $cuota->codigo }}">{{ $cuota->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Año</label>
                                                        <div class="col-sm-9">
                                                            <select name="anio" class="form-control" id="anio">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
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
                                                    @foreach($mes as $m)
                                                        <tr>
                                                            <td>
                                                                <label>
                                                                    <input type="checkbox" value="{{ $m->codigo }}" name="valueChek[]" value="0">
                                                                </label>
                                                            </td>
                                                            <td>
                                                                {{ $m->valor }}
                                                                <input type="hidden" name="mes[]" value="{{ $m->codigo }}" >
                                                            </td>
                                                            <td><input type="text" name="monto[]"></td>
                                                        </tr>
                                                    @endforeach
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