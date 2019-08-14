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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h6>Por favor corrige los errores debajo:</h6>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success background-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="icofont icofont-close-line-circled"></i>
                                    </button>
                                    {!! session('message') !!}
                                </div>
                            @endif
                            <form id="main" method="POST" action="{{ route('admin.titular_add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12 col-xl-12">

                                    <div class="alert alert-warning background-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="icofont icofont-close-line-circled"></i>
                                        </button>
                                        <strong>Advertencia!</strong> Para registrar al subtitular debe de registrar el titular
                                    </div>
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#titular" role="tab"><strong>DATOS DEL TITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#documentos" role="tab"><strong>DOCUMENTOS DEL TITULAR</strong></a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#subtitular" role="tab"><strong>DATOS DEL SUBTITULAR</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#habitan" role="tab"><strong>DATOS DE PERSONAS QUE HABITEN HOGAR</strong></a>
                                        </li> -->
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="titular" role="tabpanel">
                                            @include('admin.titular.titular')
                                        </div>
                                        <div class="tab-pane" id="documentos" role="tabpanel">
                                            @include('admin.titular.documentos')
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
                                        <a href="{{ route('admin.titular_list') }}" class="btn btn-sm btn-default m-b-0"><i class="fa fa-reply"></i> Volver</a>
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