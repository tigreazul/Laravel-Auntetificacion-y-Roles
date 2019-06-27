@extends('admin.layouts.admin')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-server bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Menu</h5>
                        <span>Administración de menus</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- card -->
                    <div class="row">
                        <div class="card panel-modulo col " style="margin-right: 15px;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5>Lista de modulos</h5>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('admin.modulo_add') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVO</a>
                                    </div>                                
                                </div>
                            </div>
                            <div class="card-block">
                                <!-- lista de tablas -->
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Route</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($data as $res)
                                            <tr class="table-verify selector-{{ $res->ID }}">
                                                <td>{{ $i }}</td>
                                                <td>{!! $res->Icono !!} {{ $res->Titulo }}</td>
                                                <td>{{ $res->Descripcion }}</td>
                                                <td><code>{{ $res->Route }}</code></td>
                                                <td><label class="label label-{{ ($res->Estado == 1)? 'success': 'danger' }}">Activo</label></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Acciones
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item select-page" href="#" data-sel="{{ $res->ID }}">
                                                                <i class="fa fa-file"></i>
                                                                Páginas
                                                            </a>
                                                            <a class="dropdown-item" href="{{ route('admin.modulo_edit', ['id'=>$res->ID]) }}">
                                                                <i class="fa fa-edit"></i>
                                                                Editar
                                                            </a>
                                                            <a class="dropdown-item alert-delete" href="#" data-id="{{ $res->ID }}" >
                                                                <i class="fa fa-trash-alt"></i>
                                                                Eliminar
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- lista de tablas -->
                            </div>
                        </div>


                        <div class="card panel-pagina col" style="display:none">
                        <!-- <div class="card panel-pagina col" style=""> -->
                            @include('admin.configuracion.pagina')
                        </div>


                    </div>
                    <!-- card -->
                </div>
            </div>
        </div>
    </div>


    <script>
        //Eliminar
        $(document).on('click','.alert-delete',function(e){
            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('data-id');
            swal({
                title: "Eliminar?",
                text: "Esta seguro que desea eliminar el registro?",
                type: "error",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
            }, 
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: local.base+'/admin/configuracion/delete/module/'+id,
                        type: 'post',
                        dataType: 'json',
                        data: {_token: CSRF_TOKEN},
                        success: function(data){
                            if(data.status == true){
                                swal("Eliminado", "Se ha eliminado correctamente.", "success");
                                setTimeout(() => {
                                    location.reload();
                                }, 3000);
                            }else{
                                swal('Ocurrio un error vuelva a intentarlo');
                                swal("Eliminado", "Ocurrio un error vuelva a intentarlo", "error");
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click','.select-page',function(e){
            e.preventDefault();
            let id =  $(this).data('sel');
            console.log(id);
            $('.selector-'+id).addClass('active');
            $('.panel-modulo').addClass('col-6');
            $('.panel-modulo').removeClass('col');
            $('.panel-pagina').show();
        });

        
    </script>
@stop