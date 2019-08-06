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
                            <form id="main" method="POST" action="{{ route('admin.expe_add') }}" novalidate="" enctype="multipart/form-data">
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#datos" role="tab"><strong>DATOS DEL TERRENO</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#direccion" role="tab"><strong>DIRECCION</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#vivienda" role="tab"><strong>VIVIENDA</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#dvivienda" role="tab"><strong>DESARROLLO DE LA VIVIENDA</strong></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#aelectrico" role="tab"><strong>APARATOS ELECTRICOS</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="datos" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nro Expediente</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nroexpediente" name="nroexpediente" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nro de Padrón</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="padron" name="padron" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Area</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="area" name="area" required onkeypress="return filterFloat(event,this);">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Grupo</label>
                                                        <div class="col-sm-10">
                                                            <select name="grupo" class="form-control" id="grupo">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($grupo as $gru)
                                                                    <option value="{{ $gru->codigo }}" data-id="{{ $gru->codigo }}" >{{ $gru->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Croquis</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id="croquis" name="croquis" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="direccion" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">MZ</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="mz" name="mz" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">LOTE</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="lote" name="lote" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">SubLote</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="sublote" name="sublote" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Tipo</label>
                                                        <div class="col-sm-5">
                                                            <select name="tipo" class="form-control" id="tipo">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($calle as $call)
                                                                    <option value="{{ $call->codigo }}" data-id="{{ $call->codigo }}" >{{ $call->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Nombre</label>
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Anexo</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="anexo" name="anexo" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Sector</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="sector" name="sector" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="vivienda" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Vivienda Imprimida</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="vimprimida" name="vimprimida" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Vivienda Recibida</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="vrecibida" name="vrecibida" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Nivel de Vivencia</label>
                                                        <div class="col-sm-5">
                                                            <select name="nvivencia" class="form-control" id="nvivencia">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($vivienda as $vive)
                                                                    <option value="{{ $vive->codigo }}" data-id="{{ $vive->codigo }}" >{{ $vive->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Constancia Canjeada</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="ccanjeada" name="ccanjeada" required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="dvivienda" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Estado de la casa</label>
                                                        <div class="col-sm-5">
                                                            <select name="ecasa" class="form-control" id="ecasa">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($casa as $cas)
                                                                    <option value="{{ $cas->codigo }}" data-id="{{ $cas->codigo }}" >{{ $cas->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">SSHH</label>
                                                        <div class="col-sm-5">
                                                            <select name="sshh" class="form-control" id="sshh">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($sshh as $sh)
                                                                    <option value="{{ $sh->codigo }}" data-id="{{ $sh->codigo }}" >{{ $sh->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Plantas</label>
                                                        <div class="col-sm-5">
                                                            <select name="plantas" class="form-control" id="plantas">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Tendedero</label>
                                                        <div class="col-sm-5">
                                                            <select name="tendedero" class="form-control" id="tendedero">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="aelectrico" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Radio</label>
                                                        <div class="col-sm-5">
                                                            <select name="radio" class="form-control" id="radio">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Refrigeradora</label>
                                                        <div class="col-sm-5">
                                                            <select name="refrigeradora" class="form-control" id="refrigeradora">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Televisor</label>
                                                        <div class="col-sm-5">
                                                            <select name="televisor" class="form-control" id="televisor">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Equipo de Sonido</label>
                                                        <div class="col-sm-5">
                                                            <select name="esonido" class="form-control" id="esonido">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Otros</label>
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" id="otros" name="otros" required>
                                                            <span class="messages"></span>
                                                        </div>
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