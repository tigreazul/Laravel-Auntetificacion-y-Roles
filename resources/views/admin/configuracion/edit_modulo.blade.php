@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Modulo</h5>
                        <span>Creación de modulo</span>
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
                            <h5>Registro de modulo</h5>
                            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.modulo_update',['id' => $data->ID ]) }}" novalidate="">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="titulo" id="titulo" required value="{{ $data->Titulo }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" required value="{{ $data->Descripcion }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Icono</label>
                                     <div class="col-sm-10">
                                        <input type="text" class="form-control" id="icono" name="icono" required value="{{ $data->Icono }}">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Route</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="route" name="route" required value="{{ $data->Route }}">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exterior" id="exterior-1" value="0" required> Interno
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="exterior" id="exterior-2" value="1" required> Externo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" name="link" required value="{{ $data->Link }}">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <hr> 
                                <div class="form-group row">
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
                    <!-- card -->
                </div>
            </div>
        </div>
    </div>
@stop