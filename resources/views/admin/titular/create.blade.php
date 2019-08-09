@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Titular</h5>
                        <span>Creación Titular</span>
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
                            <h5>Registro de Titular</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.titular_add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#titular" role="tab"><strong>DATOS DEL TITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#documentos" role="tab"><strong>DOCUMENTOS DEL TITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#subtitular" role="tab"><strong>DATOS DEL SUBTITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#habitan" role="tab"><strong>DATOS DE PERSONAS QUE HABITEN HOGAR</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="titular" role="tabpanel">
                                            @include('admin.titular.titular')
                                        </div>
                                        <div class="tab-pane" id="documentos" role="tabpanel">
                                            @include('admin.titular.documentos')
                                        </div>
                                        <div class="tab-pane" id="subtitular" role="tabpanel">
                                            @include('admin.titular.subtitular')
                                        </div>
                                        <div class="tab-pane" id="habitan" role="tabpanel">
                                            @include('admin.titular.habitan')
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
    <script src="{{ asset('js/titular.js') }}"></script>
@stop