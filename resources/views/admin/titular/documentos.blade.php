<div class="row">

    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Copia DNI</label>
            <div class="col-sm-9">
                <input type="file" class="btn btn-primary btn-sm" name="copiaDni" id="copiaDni" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ficha Padrón</label>
            <div class="col-sm-9">
                <input type="file" name="fichaPadron" id="fichaPadron" class="btn btn-primary btn-sm" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Entrego Carnet</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="carnet" name="ecarnet" required value="{{ isset($titular->entregoCarnet)?$titular->entregoCarnet:''}}">
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Codigo Tarjeta</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ctarjeta" name="ctarjeta" required value="{{ isset($titular->codigoTarjeta)?$titular->codigoTarjeta:''}}">
                <span class="messages"></span>
            </div>
        </div>
        

    </div>

</div>