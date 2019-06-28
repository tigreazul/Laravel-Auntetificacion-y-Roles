<div class="card-header">
    <div class="row">
        <div class="col">
            <h5>Lista de pagina - <code class="code_page"></code> </h5>
        </div>
        <div class="col-4">
            <a href="{{ route('admin.modulo_add') }}" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus-circle"></i> NUEVA PAGINA</a>
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