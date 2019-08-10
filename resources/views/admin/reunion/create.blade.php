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
                            <h5>Registro de Reunión</h5>
                            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                        </div>
                        <div class="card-block">
                            <form id="main" method="POST" action="{{ route('admin.reunion_add') }}" >
                                @csrf

                                <div class="col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs  tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><strong>DATOS DE LA REUNIÓN</strong></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content tabs card-block">
                                        <div class="tab-pane active" id="home1" role="tabpanel">

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Tipo de Reunión</label>
                                                        <div class="col-sm-10">
                                                            <select name="tipo_reunion" class="form-control" id="tipo_reunion" required>
                                                                <option value="">[SELECCIONE]</option>
                                                                @foreach($treunion as $reunion)
                                                                    <option value="{{ $reunion->codigo }}">{{ $reunion->valor }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nombre de Reunión</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nombre" class="form-control"  required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Monto</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="monto" class="form-control"  required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Fecha</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="fecha" class="form-control"  required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Lugar</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="lugar" class="form-control"  required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Hora Inicio</label>
                                                        <div class="col-sm-8">
                                                            <input type="time" name="hinicio" class="form-control"  required>
                                                            <span class="messages"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Hora Fin</label>
                                                        <div class="col-sm-10">
                                                            <input type="time" name="hfin" class="form-control"  required>
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
        // $(document).on('click','.chok',function(e){
        //     e.preventDefault();
        //     let esto = $(this).data('ch');
        //     console.log(esto);
        //     $('')
        // });


        // $( '.chok' ).on( 'click', function() {
        //     let esto = $(this).data('ch');
        //     if( $(this).is(':checked') ){
        //         $('.mnt'+esto).removeAttr('disabled');
        //     } else {
        //         $('.mnt'+esto).attr('disabled','disabled');
        //     }
        // });

    </script>
@stop