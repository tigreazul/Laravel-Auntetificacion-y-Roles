<a class="btn btn-success waves-effect waves-light btn-sm" data-toggle="modal" data-target="#default-Modal">Nuevo</a>
<br>
<table class="table table-hover m-b-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Ocupacion</th>
            <th>Distrito</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody  id="page-body-table">
        <tr>
            <td colspan="8" style="text-align: center;">NO EXISTE REGISTRO</td>
        </tr>
    </tbody>
</table>



<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Datos del Subtitular</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Departamento</label>
                    <div class="col-sm-9">
                        <select name="departamento" class="form-control" id="dep">
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
                        <select name="provincia" class="form-control" id="prov">
                            <option value="">[SELECCIONE]</option>
                        </select>
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Distrito</label>
                    <div class="col-sm-9">
                        <select name="distrito" class="form-control" id="dist">
                            <option value="">[SELECCIONE]</option>
                        </select>
                        <span class="messages"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ocupación</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="descripcion" id="e_page_descripcion">
                        <input type="hidden" name="id_page" id="e_id_page" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Civil</label>
                    <div class="col-sm-9">
                        <select name="civil" class="form-control" id="civils">
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
                        <select name="estado" class="form-control" id="e_page_estado">
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
                        <input type="text" class="form-control" name="descripcion" id="e_page_descripcion">
                        <input type="hidden" name="id_page" id="e_id_page" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                <button type="button" class="btn btn-default waves-effect md-close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).on('change','#dep',function(e){
        e.preventDefault();
        let code = $(this).find(':selected').data('id');
        console.log(code); 
        // return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url     : app.base+'/provincia/'+code,
            type    : 'GET',
            dataType: 'JSON',
            data    : {},
            success : function(data){
                $("#prov").removeAttr('disabled');
                $('#prov').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.provID+'" data-id="'+element.provID+'">'+element.descripcion+'</option>'
                });
                $('#prov').html(vhtml);
                $('#dist').html('<option value="">[SELECCIONE]</option>');
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });

    $(document).on('change','#prov',function(e){
        e.preventDefault();
        let code = $(this).find(':selected').data('id');
        console.log(code); 
        // return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url     : app.base+'/distrito/'+code,
            type    : 'GET',
            dataType: 'JSON',
            data    : {},
            success : function(data){
                $("#dist").removeAttr('disabled');
                $('#dist').html("");
                let vhtml = "";
                $( data.data ).each(function( index, element ){
                    vhtml += '<option value="'+element.distID+'" data-id="'+element.distID+'">'+element.descripcion+'</option>'
                });
                $('#dist').html(vhtml);
            },
            error   : function(jqxhr, textStatus, error){
                console.log(jqxhr.responseText);
            }
        });
    });
</script>