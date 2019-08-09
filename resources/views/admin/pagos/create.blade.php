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
                            <div class="col-sm-8" style="margin-left: 20%;">
                                <div class="form-group row">
                                    <div class="input-group input-group-button ">
                                        <input type="text" class="form-control" placeholder="Buscar">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="images" name="images" required disabled>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Direccion</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="images" name="images" required disabled>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Grupo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="images" name="images" required disabled>
                                            <span class="messages"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                                                        
                            <div class="row">

                                <div class="col-sm-6">
                                    <h4>REUNIONES CON DEUDAS</h4>
                                    <div class="dt-responsive table-responsive">
                                        <!-- lista de tablas -->
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha</th>
                                                    <th>Mes</th>
                                                    <th>Monto</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; $total = 0; @endphp
                                                @forelse($reuniones as $multa)
                                                    <tr class="table-verify selector-{{ $multa->idDetalleReunion }}">
                                                        <td>{{ $i }}</td>
                                                        <td class="tipo_multa">{{ $multa->tipo }}</td>
                                                        <td class="fecha_tipo">{{ $multa->fecha }}</td>
                                                        <td>{{ $multa->MES }}</td>
                                                        <td>s/. <span class="multa_monto">{{ $multa->multa }}</span></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary btn-sm justificar_btn"  href="#" data-id="{{ $multa->idDetalleReunion }}">
                                                                    <i class="fa fa-edit"></i>
                                                                    Justificar
                                                                </a> 
                                                                <a class="btn btn-success btn-sm alert-delete pagar_btn" href="#" data-id="{{ $multa->idDetalleReunion }}" style="margin-left: 5px;">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                    Pagar
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php  $total = $total + $multa->multa; $i++; @endphp
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#f4f6f7"> <strong>NO EXISTE REGISTRO</strong></td>
                                                    </tr>
                                                @endforelse
                                                <tr style="background-color: rgba(64,153,255,.1)">
                                                    <td colspan="4" style="text-align:right">TOTAL:</td>
                                                    <td colspan="2" style="text-align:left">s/. {{ $total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- lista de tablas -->
                                        <div class="table-responsive">
                                        </div>
                                        <div class="card-block p-b-0">
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>CUOTAS DE TEMA LEGAL</h4>
                                    <div class="dt-responsive table-responsive">
                                        <!-- lista de tablas -->
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha</th>
                                                    <th>Mes</th>
                                                    <th>Monto</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; $total = 0; @endphp
                                                @forelse($legal as $leg)
                                                    <tr class="table-verify selector-{{ $leg->idCuotaDetalle }}">
                                                        <td>{{ $i }}</td>
                                                        <td class="tipo_multa">{{ $leg->tipo }}</td>
                                                        <td class="fecha_tipo">{{ \Carbon\Carbon::parse($leg->fechaRegistro)->format('Y-m-d') }}</td>
                                                        <td>{{ $leg->mes }}</td>
                                                        <td> <span class="multa_monto">{{ $leg->monto }}</span></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary btn-sm justificar_btn"  href="#" data-id="{{ $leg->idCuotaDetalle }}">
                                                                    <i class="fa fa-edit"></i>
                                                                    Justificar
                                                                </a> 
                                                                <a class="btn btn-success btn-sm alert-delete pagar_btn" href="#" data-id="{{ $leg->idCuotaDetalle }}" style="margin-left: 5px;">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                    Pagar
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php  $total = $total + $leg->monto; $i++; @endphp
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#f4f6f7"> <strong>NO EXISTE REGISTRO</strong></td>
                                                    </tr>
                                                @endforelse
                                                <tr style="background-color: rgba(64,153,255,.1)">
                                                    <td colspan="4" style="text-align:right">TOTAL:</td>
                                                    <td colspan="2" style="text-align:left">{{ $total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- lista de tablas -->
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <h4>CUOTAS ADM. Y EXTRAORDINARIAS</h4>
                                    <div class="dt-responsive table-responsive">
                                        <!-- lista de tablas -->
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha</th>
                                                    <th>Mes</th>
                                                    <th>Monto</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; $total = 0; @endphp
                                                @forelse($cuota as $multa)
                                                    <tr class="table-verify selector-{{ $multa->idCuotaDetalle }}">
                                                        <td>{{ $i }}</td>
                                                        <td class="tipo_multa">{{ $multa->tipo }}</td>
                                                        <td class="fecha_tipo">{{ \Carbon\Carbon::parse($multa->fechaRegistro)->format('Y-m-d') }}</td>
                                                        <td>{{ $multa->mes }}</td>
                                                        <td> <span class="multa_monto">{{ $multa->monto }}</span> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary btn-sm justificar_btn"  href="#" data-id="{{ $multa->idCuotaDetalle }}">
                                                                    <i class="fa fa-edit"></i>
                                                                    Justificar
                                                                </a> 
                                                                <a class="btn btn-success btn-sm alert-delete pagar_btn" href="#" data-id="{{ $multa->idCuotaDetalle }}" style="margin-left: 5px;">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                    Pagar
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php  $total = $total + $multa->monto; $i++; @endphp
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#f4f6f7"> <strong>NO EXISTE REGISTRO</strong></td>
                                                    </tr>
                                                @endforelse
                                                <tr style="background-color: rgba(64,153,255,.1)">
                                                    <td colspan="4" style="text-align:right">TOTAL:</td>
                                                    <td colspan="2" style="text-align:left">{{ $total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- lista de tablas -->
                                        <div class="table-responsive">
                                        </div>
                                        <div class="card-block p-b-0">
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
    

    <div class="modal fade" id="justificar-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">JUSTIFICAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.pagos_add') }}" id="update">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" id="tipo_data">FAENA</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="descripcion" id="fecha_tipo" disabled>
                                <input type="hidden" name="id" id="idjustifica" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PRESENCIA</label>
                            <div class="col-sm-9">
                                <select name="precencia" class="form-control" id="e_page_estado">
                                    <option value="">[SELECCIONE]</option>
                                    @foreach($prefencia as $pref)
                                        <option value="{{ $pref->codigo }}">{{ $pref->valor }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MOTIVO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="motivo" id="monto_tip" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        <button type="button" class="btn btn-default waves-effect md-close" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="pagar-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">PAGAR</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.pagos_add') }}" id="update">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" id="pago_tipo">ASAMBLEA</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tipo" id="pfecha_tipo" disabled>
                                <input type="hidden" name="idusuario" id="idPago" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">RECIBIDO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="monto" id="pag_monto">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        <button type="button" class="btn btn-default waves-effect md-close" data-dismiss="modal">Close</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>



    <script>
        $(document).on('click','.justificar_btn',function(){
            let data = $(this).data('id');
            let tipo_m = $('.selector-'+data+' .tipo_multa').text();
            let fecha_m = $('.selector-'+data+' .fecha_tipo').text();
            let monto_m = $('.selector-'+data+' span.multa_monto').text();
            $('#justificar-Modal').modal('show');
            $('#tipo_data').text(tipo_m);
            $('#fecha_tipo').val(fecha_m);
            $('#monto_tip').val(monto_m);
            $('#monto_tip').attr('max',monto_m);

            $('#idjustifica').val(data);
        });


        $(document).on('click','.pagar_btn',function(){
            let data = $(this).data('id');
            let tipo_m = $('.selector-'+data+' .tipo_multa').text();
            let fecha_m = $('.selector-'+data+' .fecha_tipo').text();
            let monto_m = $('.selector-'+data+' span.multa_monto').text();

            $('#pagar-Modal').modal('show');

            $('#pago_tipo').text(tipo_m);
            $('#pfecha_tipo').val(fecha_m);
            $('#pag_monto').attr('max',monto_m);
            $('#idPago').val(data);
        });

    </script>

@stop