<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Datos del Subtitular</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="guardar-subtitular">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombre" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="apaterno" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Materno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amaterno" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">DNI</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dni" onKeyPress="return soloNumeros(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select name="sexo" class="form-control" id="sexo" required>
                                <option value="">[SELECCIONE]</option>
                                <option value="F">FEMENINO</option>
                                <option value="M">MASCULINO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Instrucción</label>
                        <div class="col-sm-9">
                            <select name="grado" class="form-control" id="grado" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($institucion as $inst)
                                    <option value="{{ $inst->codigo }}" >{{ $inst->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ocupación</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ocupacion" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Civil</label>
                        <div class="col-sm-9">
                            <select name="civil" class="form-control" id="civils" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($civil as $civi)
                                    <option value="{{ $civi->codigo }}">{{ $civi->valor }}</option>
                                @endforeach
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Relación</label>
                        <div class="col-sm-9">
                            <select name="relacion" class="form-control" id="e_page_estado" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($relacion as $rela)
                                    <option value="{{ $rela->codigo }}">{{ $rela->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="telefono" onKeyPress="return soloNumeros(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Departamento</label>
                        <div class="col-sm-9">
                            <select name="dptoSub" class="form-control" id="dep" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($departamento as $dep)
                                    <option value="{{ $dep->id }}" data-id="{{ $dep->id }}">{{ $dep->descripcion }}</option>
                                @endforeach
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provincia</label>
                        <div class="col-sm-9">
                            <select name="provSub" class="form-control" id="prov" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Distrito</label>
                        <div class="col-sm-9">
                            <select name="distSub" class="form-control" id="dist" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
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


<div class="modal fade" id="modal-habitan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DATOS DE PERSONAS QUE HABITEN HOGAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="guardar-habitan">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombre" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="apaterno" onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Materno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amaterno" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">DNI</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dni" onKeyPress="return soloNumeros(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select name="sexo" class="form-control" id="sexo" required>
                                <option value="">[SELECCIONE]</option>
                                <option value="F">FEMENINO</option>
                                <option value="M">MASCULINO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Instrucción</label>
                        <div class="col-sm-9">
                            <select name="grado" class="form-control" id="grado" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($institucion as $inst)
                                    <option value="{{ $inst->codigo }}" >{{ $inst->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Relación</label>
                        <div class="col-sm-9">
                            <select name="relacion" class="form-control" id="e_page_estado" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($relacion as $rela)
                                    <option value="{{ $rela->codigo }}">{{ $rela->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Departamento</label>
                        <div class="col-sm-9">
                            <select name="dptoSub" class="form-control" id="depH" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($departamento as $dep)
                                    <option value="{{ $dep->id }}" data-id="{{ $dep->id }}">{{ $dep->descripcion }}</option>
                                @endforeach
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provincia</label>
                        <div class="col-sm-9">
                            <select name="provSub" class="form-control" id="provH" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Distrito</label>
                        <div class="col-sm-9">
                            <select name="distSub" class="form-control" id="distH" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
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



<div class="modal fade" id="modal-hijos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DATOS DE LOS HIJOS QUE VIVEN EN EL HOGAR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="guardar-subtitular">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombre" required onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="apaterno" required onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Apellido Materno</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amaterno" required onkeypress="return soloLetras(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">DNI</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dni" onKeyPress="return soloNumeros(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select name="sexo" class="form-control" id="sexo" required>
                                <option value="">[SELECCIONE]</option>
                                <option value="F">FEMENINO</option>
                                <option value="M">MASCULINO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Instrucción</label>
                        <div class="col-sm-9">
                            <select name="grado" class="form-control" id="grado" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($institucion as $inst)
                                    <option value="{{ $inst->codigo }}" >{{ $inst->valor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ocupación</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ocupacion" onkeypress="return soloLetras(event)" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Civil</label>
                        <div class="col-sm-9">
                            <select name="civil" class="form-control" id="civils" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($civil as $civi)
                                    <option value="{{ $civi->codigo }}">{{ $civi->valor }}</option>
                                @endforeach
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="telefono" required onKeyPress="return soloNumeros(event)" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Departamento</label>
                        <div class="col-sm-9">
                            <select name="dptoSub" class="form-control" id="dep" required>
                                <option value="">[SELECCIONE]</option>
                                @foreach($departamento as $dep)
                                    <option value="{{ $dep->id }}" data-id="{{ $dep->id }}">{{ $dep->descripcion }}</option>
                                @endforeach
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Provincia</label>
                        <div class="col-sm-9">
                            <select name="provSub" class="form-control" id="prov" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Distrito</label>
                        <div class="col-sm-9">
                            <select name="distSub" class="form-control" id="dist" required>
                                <option value="">[SELECCIONE]</option>
                            </select>
                            <span class="messages"></span>
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
    $(document).on('submit','#guardar-subtitular',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var serial = $(this).serialize();
        let idTitu = $('#idTitu').val();

        $.ajax({
            url: "{{ route('admin.subtitular_add')}}",
            method:'post',
            dataType: 'json',
            data: serial+"&idTitular="+idTitu,
            beforeSend:function(){
                $('.loader-cards').parents('.card').addClass("card-load");
                $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
            },
            success: function(data){
                console.log(data.status);
                if(data.status == true){
                    $('#subtitular-body-table').html("");
                    $('#default-Modal').modal('hide');
                    let vhtml = "";
                    let i = 0;
                    $( data.lst ).each(function( index, element ){
                        i++;
                        vhtml += '<tr><td>'+i+'</td>';
                        vhtml += '<td>'+element.nombre+'</td>';
                        vhtml += '<td>'+element.apellidoPaterno+'</td>';
                        vhtml += '<td>'+element.dni+'</td>';
                        vhtml += '<td>'+element.ocupacion+'</td>';
                        vhtml += '<td>'+element.departamento+' / '+element.provincia+' / '+element.distrito+'</td>';
                        vhtml += '<td><div class="btn-group">';
                        vhtml += '<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>';
                        vhtml += '<div class="dropdown-menu">'
                        vhtml += '<a class="dropdown-item" href="">';
                        vhtml += '<i class="fa fa-edit"></i>Editar</a>';
                        vhtml += '<a class="dropdown-item alert-delete" href="#" data-id="'+element.idSubtitular+'" ><i class="fa fa-trash-alt"></i>Eliminar</a>';
                        vhtml += '</div></div></td>';
                        vhtml += '<tr>';
                        // sub->departamento.' / '.$sub->provincia.' / '.$sub->distrito
                    });

                    $('#subtitular-body-table').html(vhtml);
                }
            },
            complete: function(){
                $('.loader-cards').parents('.card').children(".card-loader").remove();
                $('.loader-cards').parents('.card').removeClass("card-load");
            }
        });
        $('#guardar-subtitular')[0].reset();
        return false;
    });


    $(document).on('submit','#guardar-habitan',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var serial = $(this).serialize();
        let idTitu = $('#idTitu').val();

        $.ajax({
            url: "{{ route('admin.habitan_add')}}",
            method:'post',
            dataType: 'json',
            data: serial+"&idTitular="+idTitu,
            beforeSend:function(){
                $('.loader-cards').parents('.card').addClass("card-load");
                $('.loader-cards').parents('.card').append('<div class="card-loader"><i class="feather icon-radio rotate-refresh"></div>');
            },
            success: function(data){
                console.log(data.status);
                if(data.status == true){
                    $('#habitan-body-table').html("");
                    $('#modal-habitan').modal('hide');
                    let vhtml = "";
                    let i = 0;
                    $( data.lst ).each(function( index, element ){
                        i++;
                        vhtml += '<tr><td>'+i+'</td>';
                        vhtml += '<td>'+element.nombre+'</td>';
                        vhtml += '<td>'+element.apellidoPaterno+'</td>';
                        vhtml += '<td>'+element.dni+'</td>';
                        vhtml += '<td>'+element.relacion+'</td>';
                        vhtml += '<td><div class="btn-group">';
                        vhtml += '<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>';
                        vhtml += '<div class="dropdown-menu">'
                        vhtml += '<a class="dropdown-item" href="" data-id="'+element.idMiembro+'">';
                        vhtml += '<i class="fa fa-edit"></i>Editar</a>';
                        vhtml += '<a class="dropdown-item alert-delete" href="#" data-id="'+element.idMiembro+'" ><i class="fa fa-trash-alt"></i>Eliminar</a>';
                        vhtml += '</div></div></td>';
                        vhtml += '<tr>';
                    });

                    $('#habitan-body-table').html(vhtml);
                }
            },
            complete: function(){
                $('.loader-cards').parents('.card').children(".card-loader").remove();
                $('.loader-cards').parents('.card').removeClass("card-load");
            }
        });
        $('#guardar-habitan')[0].reset();
        return false;
    });

</script>