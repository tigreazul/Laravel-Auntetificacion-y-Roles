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
                            <form id="main" method="POST" action="{{ route('admin.expe_edit_data',['id' => $expediente->idExpediente] ) }}" novalidate="" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
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
                                                            <input type="text" class="form-control" id="nroexpediente" name="nroexpediente" required value="{{ isset($expediente->nroExpediente)?$expediente->nroExpediente:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nro de Padrón</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="padron" name="padron" required value="{{ isset($expediente->nroPadron)?$expediente->nroPadron:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Area</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="area" name="area" required onkeypress="return filterFloat(event,this);" value="{{ isset($expediente->area)?$expediente->area:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Grupo</label>
                                                        <div class="col-sm-10">
                                                            <select name="grupo" class="form-control" id="grupo">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($grupo as $gru)
                                                                idGrupo
                                                                    <option value="{{ $gru->codigo }}" {{ isset($expediente->idGrupo)?( $expediente->idGrupo == $gru->codigo ?'selected':'' ):'' }} >{{ $gru->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Croquis</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id="croquis" name="croquis" required value="{{ isset($expediente->aPlano)?$expediente->aPlano:''}}">
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
                                                            <input type="text" class="form-control" id="mz" name="mz" required value="{{ isset($expediente->nomManzana)?$expediente->nomManzana:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">LOTE</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="lote" name="lote" required value="{{ isset($expediente->nrLote)?$expediente->nrLote:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">SubLote</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="sublote" name="sublote" required value="{{ isset($expediente->nroSubLote)?$expediente->nroSubLote:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Tipo</label>
                                                        <div class="col-sm-5">
                                                            <select name="tipo" class="form-control" id="tipo">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($calle as $call)
                                                                    <option value="{{ $call->codigo }}" {{ isset($expediente->idCalle)?( $expediente->idCalle == $call->codigo ?'selected':'' ):'' }} >{{ $call->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Nombre</label>
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" id="direccion" name="direccion" required value="{{ isset($expediente->nomDireccion)?$expediente->nomDireccion:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Anexo</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="anexo" name="anexo" required value="{{ isset($expediente->anexo)?$expediente->anexo:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Sector</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="sector" name="sector" required value="{{ isset($expediente->sector)?$expediente->sector:''}}">
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
                                                            <input type="text" class="form-control" id="vimprimida" name="vimprimida" required value="{{ isset($expediente->vimprimida)?$expediente->vimprimida:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Vivienda Recibida</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="vrecibida" name="vrecibida" required value="{{ isset($expediente->vrecibida)?$expediente->vrecibida:''}}">
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Nivel de Vivencia</label>
                                                        <div class="col-sm-5">
                                                            <select name="nvivencia" class="form-control" id="nvivencia">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($vivienda as $vive)
                                                                    <option value="{{ $vive->codigo }}" {{ isset($expediente->idVivencia)?( $expediente->idVivencia == $vive->codigo ?'selected':'' ):'' }} >{{ $vive->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Constancia Canjeada</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" id="ccanjeada" name="ccanjeada" required value="{{ isset($expediente->ccanjeada)?$expediente->ccanjeada:''}}">
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
                                                                    <option value="{{ $cas->codigo }}" {{ isset($expediente->idCasa)?( $expediente->idCasa == $cas->codigo ?'selected':'' ):'' }} >{{ $cas->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">SSHH</label>
                                                        <div class="col-sm-5">
                                                            <select name="sshh" class="form-control" id="sshh">
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($sshh as $sh)
                                                                    <option value="{{ $sh->codigo }}" {{ isset($expediente->idSSHH)?( $expediente->idSSHH == $sh->codigo ?'selected':'' ):'' }} >{{ $sh->valor }}</option>
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
                                                                <option value="1" {{ isset($expediente->idPlantas)?( $expediente->idPlantas == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idPlantas)?( $expediente->idPlantas == '0'?'selected':'' ):'' }} >NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Tendedero</label>
                                                        <div class="col-sm-5">
                                                            <select name="tendedero" class="form-control" id="tendedero">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1" {{ isset($expediente->idTendero)?( $expediente->idTendero == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idTendero)?( $expediente->idTendero == '0'?'selected':'' ):'' }} >NO</option>
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
                                                                <option value="1" {{ isset($expediente->idRadio)?( $expediente->idRadio == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idRadio)?( $expediente->idRadio == '0'?'selected':'' ):'' }} >NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Refrigeradora</label>
                                                        <div class="col-sm-5">
                                                            <select name="refrigeradora" class="form-control" id="refrigeradora">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1" {{ isset($expediente->idRefrigerador)?( $expediente->idRefrigerador == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idRefrigerador)?( $expediente->idRefrigerador == '0'?'selected':'' ):'' }} >NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Televisor</label>
                                                        <div class="col-sm-5">
                                                            <select name="televisor" class="form-control" id="televisor">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1" {{ isset($expediente->idTelevisor)?( $expediente->idTelevisor == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idTelevisor)?( $expediente->idTelevisor == '0'?'selected':'' ):'' }} >NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">Equipo de Sonido</label>
                                                        <div class="col-sm-5">
                                                            <select name="esonido" class="form-control" id="esonido">
                                                                <option value="">[SELECCIONE]</option>
                                                                <option value="1" {{ isset($expediente->idSonido)?( $expediente->idSonido == '1'?'selected':'' ):'' }} >SI</option>
                                                                <option value="0" {{ isset($expediente->idSonido)?( $expediente->idSonido == '0'?'selected':'' ):'' }} >NO</option>
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Otros</label>
                                                        <div class="col-sm-11">
                                                            <input type="text" class="form-control" id="otros" name="otros" required value="{{ isset($expediente->otros)?$expediente->otros:''}}">
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
                                        <a href="{{ route('admin.expe_list') }}" class="btn btn-sm btn-default m-b-0"><i class="fa fa-reply"></i> Volver</a>
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