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
                                    <div class="col-42">
                                        <a href="{{ route('admin.modulo_add') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVO MODULO</a>
                                    </div>                                
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <!-- lista de tablas -->
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Titulo</th>
                                                <th class="column_description">Descripción</th>
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
                                                    <td class="column_description">{{ $res->Descripcion }}</td>
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
                                    <div class="table-responsive">
                                    </div>
                                    <div class="card-block p-b-0">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card panel-pagina col" style="display:none">
                        <!-- <div class="card panel-pagina col" style=""> -->
                            @include('admin.configuracion.pagina')
                        </div>


                    </div>
                    <div class="md-overlay"></div>
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
                                // swal('Ocurrio un error vuelva a intentarlo');
                                swal("Eliminado", "Ocurrio un error vuelva a intentarlo", "error");
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click','.select-page',function(e){
            e.preventDefault();
            $('.table-verify').removeClass('active');
            let id =  $(this).data('sel');
            $('.selector-'+id).addClass('active');
            $('.panel-modulo').addClass('col-6');
            $('.panel-modulo').removeClass('col');
            $('.panel-pagina').show();
            $('.column_description').css('display','none');

            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // var id = $(this).attr('data-id');
            $('#id_module').val(id);
            $.ajax({
                url: local.base+'/admin/configuracion/menu/get-page/'+id,
                type: 'GET',
                dataType: 'json',
                data: {_token: CSRF_TOKEN},
                beforeSend: function(){
                    var $this = $(this);
                    $('.loader-cards').parents('.card').addClass("card-load");
                    $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
                },
                success: function(data){
                    if(data.status == true){
                        $('.code_page').text(data.modulo);
                        $('#page-body-table').html("");
                        let vhtml = "";
                        console.log(data.pagina.length);
                        if(data.pagina.length != 0){
                            $.each(data.pagina,function(k,v){
                                vhtml += '<tr>';
                                vhtml += '<td>'+(k+1)+'</td>';
                                vhtml += '<td>'+v.Descripcion+'</td>';
                                vhtml += '<td><code>'+v.Ruta+'</code></td>';
                                vhtml += '<td><label class="label label-success">Activo</label></td>';
                                vhtml += `<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#default-Modal" href="{{ route('admin.modulo_edit', ['id'=>`+v.ID+`]) }}">
                                                        <i class="fa fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item alert-delete" href="#" data-id="`+v.ID+`" >
                                                        <i class="fa fa-trash-alt"></i>
                                                        Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </td>`;
                                vhtml += '</tr>';
                            });
                        }else{
                            vhtml = `
                            <tr>
                                <td colspan="5" class="not-row"><strong> No existen datos</strong></td>
                            </tr>
                            `
                        }
                        $('#page-body-table').html(vhtml);

                    }else{
                        swal('Ocurrio un error vuelva a intentarlo');
                    }
                },
                complete: function(){
                    $('.loader-cards').parents('.card').children(".card-loader").remove();
                    $('.loader-cards').parents('.card').removeClass("card-load");
                }
            });
        });


        $(document).on('submit','#save_page',function(e){
            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // var id = $(this).attr('data-id');
            var url     = $(this).attr('action');
            // var serial  = $(this).serialize();

            let desc = $('#page_descripcion').val();
            let ruta = $('#page_ruta').val();
            let slug = $('#page_slug').val();
            let est  = $('#page_estado').val();
            let id   = $('#id_module').val();

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {_token: CSRF_TOKEN,descripcion:desc,ruta:ruta,slug:slug,estado:est,id:id},
                beforeSend: function(){
                    var $this = $(this);
                    $('.loader-cards').parents('.card').addClass("card-load");
                    $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
                },
                success: function(data){
                    if(data.status == true){
                        $('.md-close').trigger('click');
                        $('.code_page').text(data.modulo);
                        $('#page-body-table').html("");
                        let vhtml = "";
                        console.log(data.pagina.length);
                        if(data.pagina.length != 0){
                            $.each(data.pagina,function(k,v){
                                vhtml += '<tr>';
                                vhtml += '<td>'+(k+1)+'</td>';
                                vhtml += '<td>'+v.Descripcion+'</td>';
                                vhtml += '<td><code>'+v.Ruta+'</code></td>';
                                vhtml += '<td><label class="label label-success">Activo</label></td>';
                                vhtml += `<td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.modulo_edit', ['id'=>`+v.ID+`]) }}">
                                                        <i class="fa fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item alert-delete" href="#" data-id="`+v.ID+`" >
                                                        <i class="fa fa-trash-alt"></i>
                                                        Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </td>`;
                                vhtml += '</tr>';
                            });
                        }else{
                            vhtml = `
                            <tr>
                                <td colspan="5" class="not-row"><strong> No existen datos</strong></td>
                            </tr>
                            `
                        }
                        $('#page-body-table').html(vhtml);

                    }else{
                        swal('Ocurrio un error vuelva a intentarlo');
                    }
                },
                complete: function(){
                    $('#save_page')[0].reset();
                    $('.loader-cards').parents('.card').children(".card-loader").remove();
                    $('.loader-cards').parents('.card').removeClass("card-load");
                }
            });
        });

        
    </script>


    <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar pagina</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.page_add') }}" id="save_page">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="descripcion" id="e_page_descripcion">
                                <input type="hidden" name="id_module" id="e_id_module" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ruta</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ruta" id="e_page_ruta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" id="e_page_slug">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado</label>
                            <div class="col-sm-9">
                                <select name="estado" class="form-control" id="e_page_estado">
                                    <option value="1">Activo</option>
                                    <option value="0">Desabilitado</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                    <button type="button" class="btn btn-default waves-effect md-close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@stop