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
$(document).on('click','.alert-delete-page',function(e){
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
                url: local.base+'/admin/configuracion/delete/page/'+id,
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
        data: {},
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
                                            <a class="dropdown-item editar_page" data-toggle="modal" data-target="#default-Modal" href="#" data-id="`+v.ID+`" data-mod="`+v.ModuloID+`">
                                                <i class="fa fa-edit"></i>
                                                Editar
                                            </a>
                                            <a class="dropdown-item alert-delete-page" href="#" data-id="`+v.ID+`" >
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
                                            <a class="dropdown-item editar_page" data-toggle="modal" data-target="#default-Modal" href="#" data-id="`+v.ID+`">
                                                <i class="fa fa-edit"></i>
                                                Editar
                                            </a>
                                            <a class="dropdown-item alert-delete-page" href="#" data-id="`+v.ID+`" >
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

$(document).on('click','.editar_page',function(e){
    e.preventDefault();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    let idModulo = $(this).data('mod');
    let idPagina = $(this).data('id');
    console.log(idPagina);
    $('#e_id_page').val(idPagina);
    
    $.ajax({
        url: local.base+'/admin/configuracion/menu/get-page-id/'+idPagina,
        type: 'GET',
        dataType: 'json',
        data: {},
        beforeSend: function(){
            var $this = $(this);
            $('.loader-cards').parents('.card').addClass("card-load");
            $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
        },
        success: function(data){
            console.log(data); 
            // return false;
            if(data.status == true){
                if(data.pagina.length != 0){
                    $('#e_page_descripcion').val(data.pagina.Descripcion);
                    $('#e_page_ruta').val(data.pagina.Ruta);
                    // $('#e_page_slug').val(data.pagina.Slug);
                    $('#e_page_estado').val(data.pagina.Estado);
                }else{
                    swal('No se encontro datos');    
                }
            }else{
                swal('Ocurrio un error vuelva a intentarlo');
            }
        },
        complete: function(){
            // $('#update_page')[0].reset();
            $('.loader-cards').parents('.card').children(".card-loader").remove();
            $('.loader-cards').parents('.card').removeClass("card-load");
        }
    });
});


$(document).on('submit','#update_page',function(e){
    e.preventDefault();
    var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
    let idpage      = $('#e_id_page').val();
    let url         = $(this).attr('action');

    let desc = $('#e_page_descripcion').val();
    let ruta = $('#e_page_ruta').val();
    let slug = $('#e_page_slug').val();
    let est  = $('#e_page_estado').val();
    let id   = $('#id_module').val();
    
    let data = {
        _token      : CSRF_TOKEN,
        descripcion : desc,
        ruta        : ruta,
        slug        : slug,
        estado      : est,
        idmodulo    : id,
        idpage      : idpage
    }
    // console.log(url);
    // return false;
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: data,
        beforeSend: function(){
            var $this = $(this);
            $('.loader-cards').parents('.card').addClass("card-load");
            $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
        },
        success: function(data){
            console.log(data); 
            // return false;
            if(data.status == true){
                // $('.md-close').trigger('click');
                // $('.code_page').text(data.modulo);
                // $('#page-body-table').html("");
                let vhtml = "";
                console.log(data.pagina.length);
                // if(data.pagina.length != 0){
                //     $('#e_page_descripcion').val(data.pagina[0].Descripcion);
                //     $('#e_page_ruta').val(data.pagina[0].Ruta);
                //     $('#e_page_slug').val(data.pagina[0].Slug);
                //     $('#e_page_estado').val(data.pagina[0].Estado);
                // }else{
                //     swal('No se encontro datos');    
                // }
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
                                            <a class="dropdown-item editar_page" data-toggle="modal" data-target="#default-Modal" href="#" data-id="`+v.ID+`" data-mod="`+v.ModuloID+`">
                                                <i class="fa fa-edit"></i>
                                                Editar
                                            </a>
                                            <a class="dropdown-item alert-delete-page" href="#" data-id="`+v.ID+`" >
                                                <i class="fa fa-trash-alt"></i>
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </td>`;
                        vhtml += '</tr>';
                    });
                    $('#page-body-table').html(vhtml);
                }else{
                    swal('No se encontro datos');    
                }

            }else{
                swal('Ocurrio un error vuelva a intentarlo');
            }
        },
        complete: function(){
            $('#modal-12').model('hide');
            // $('#update_page')[0].reset();
            $('.loader-cards').parents('.card').children(".card-loader").remove();
            $('.loader-cards').parents('.card').removeClass("card-load");
        }
    });
    return false;
});