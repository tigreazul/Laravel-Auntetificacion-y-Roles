<div class="row">

    <div class="col-sm-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="images" name="nombre" onkeypress="return soloLetras(event)" value="{{$titular->nombre}}" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Apellido Paterno</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="images" name="apaterno" onkeypress="return soloLetras(event)" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Apellido Materno</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="images" name="amaterno" onkeypress="return soloLetras(event)" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Fecha Nacimiento</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="nacimiento" name="nacimiento" required>
                <span class="messages"></span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Departamento</label>
            <div class="col-sm-9">
                <select name="departamento" class="form-control" id="departamentos">
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
                <select name="provincia" class="form-control" id="provincias">
                    <option value="">[SELECCIONE]</option>
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Distrito</label>
            <div class="col-sm-9">
                <select name="distrito" class="form-control" id="distritos">
                    <option value="">[SELECCIONE]</option>
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Grado de institucion</label>
            <div class="col-sm-9">
                <select name="grado" class="form-control" id="grado">
                    <option value="">[SELECCIONE]</option>
                    @foreach($institucion as $inst)
                        <option value="{{ $inst->codigo }}">{{ $inst->valor }}</option>
                    @endforeach
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Forma de Ingreso</label>
            <div class="col-sm-9">
                <select name="ingreso" class="form-control" id="ingreso" >
                    <option value="">[SELECCIONE]</option>
                    @foreach($ingreso as $ing)
                        <option value="{{ $ing->codigo }}">{{ $ing->valor }}</option>
                    @endforeach
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nro de Recibo</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nroRecibo" name="nroRecibo" required>
                <span class="messages"></span>
            </div>
        </div>
        
    </div>


    <div class="col-sm-6">
        <div style="width: 100%;height: 200px;border: 1px solid #b3b3b3;margin: 7px;background: #efefef;">
            <img src="" id="imagen_preview" style="width: 290px;display: block;margin: auto;">
            <p style="padding-top: 84px;text-align: center;color: #c5c5c5;">SIN IMAGEN</p>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Subir imagen</label>
            <div class="col-sm-9">
                <!-- <div class="btn btn-primary btn-sm">Seleccione</div> -->
                <input class="btn btn-primary btn-sm" type="file" name="imagen" id="aaa" onchange="mostrar()">
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">DNI</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="dni" name="dni" onKeyPress="return soloNumeros(event)" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ocupacion</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="ocupacion" name="ocupacion" required>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sexo</label>
            <div class="col-sm-9">
                <select name="sexo" class="form-control" id="sexo">
                    <option value="">[SELECCIONE]</option>
                    <option value="F">FEMENINO</option>
                    <option value="M">MASCULINO</option>
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Estado Civil</label>
            <div class="col-sm-9">
                <select name="ecivil" class="form-control" id="ecivil">
                    <option value="">[SELECCIONE]</option>
                    @foreach($civil as $civi)
                        <option value="{{ $civi->codigo }}">{{ $civi->valor }}</option>
                    @endforeach
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Estado Socio</label>
            <div class="col-sm-9">
                <select name="esocio" class="form-control" id="esocio">
                    <option value="">[SELECCIONE]</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="DESACTIVADO">DESACTIVADO</option>
                </select>
                <span class="messages"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Fecha de Ingreso</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="fingreso" name="fingreso" required>
                <span class="messages"></span>
            </div>
        </div>
    </div>
</div>