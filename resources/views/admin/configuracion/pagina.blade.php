<div class="card-header">
    <div class="row">
        <div class="col">
            <h5>Lista de pagina - <code class="code_page"></code> </h5>
            <div class="card-header-right loader-cards"></div>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-primary btn-sm waves-effect md-trigger" data-modal="modal-12"><i class="fa fa-plus-circle"></i> NUEVA PAGINA</button>
            <!-- <a href="{{ route('admin.modulo_add') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVA PAGINA</a> -->
        </div>                                
    </div>

</div>
<div class="card-block">

    <table class="table table-hover m-b-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Route</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody  id="page-body-table">
           
        </tbody>
    </table>
</div>



<div class="md-modal md-effect-12" id="modal-12">
    <div class="md-content">
        <h3><span class="text-muted text-center">Página</span></h3>
    <div>
    <!-- <p>This is a modal window. You can do the following things with it:</p> -->
    <div class="card">
        <div class="card-header">
            <h5>Registro</h5>
            <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
        </div>
        <div class="card-block loader-cards">
            <div class="row">
                <div class="col-sm-12 mobile-inputs">
                    <form method="POST" action="{{ route('admin.page_add') }}" id="save_page">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="descripcion" id="page_descripcion">
                                <input type="hidden" name="id_module" id="id_module" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ruta</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ruta" id="page_ruta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" id="page_slug">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Estado</label>
                            <div class="col-sm-9">
                                <select name="estado" class="form-control" id="page_estado">
                                    <option value="1">Activo</option>
                                    <option value="0">Desabilitado</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">Guardar</button>
                        <button type="button" class="btn btn-default waves-effect md-close">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- <script src="{{ asset('theme_admin/js/modal.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('theme_admin/js/modalEffects.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme_admin/js/classie.js') }}" type="text/javascript"></script>