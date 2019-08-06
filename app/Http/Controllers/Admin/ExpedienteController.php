<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Expediente, Manzanas
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DB;

class ExpedienteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        $grupo = \Views::diccionario('idGrupo');

        $expediente = DB::table('expediente')
        ->join('manzanas', 'expediente.idExpediente', '=', 'manzanas.idExpediente')
        ->join('grupo', 'grupo.idGrupo', '=', 'manzanas.idGrupo')        
        ->get();

        $a_data_page = array(
            'title' => 'Lista de Expediente',
            'grupo'=> $grupo,
            'expediente'=> $expediente
        );

        return \Views::admin('expediente.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = \Views::diccionario('idGrupo');
        $vivienda = \Views::diccionario('idVivencia');
        $casa = \Views::diccionario('idCasa');
        $sshh = \Views::diccionario('idSSHH');
        $calle = \Views::diccionario('idCalle');
        

        $a_data_page = array(
            'title' => 'Registro de paginas',
            'grupo'=> $grupo,
            'vivienda' => $vivienda,
            'sshh' => $sshh,
            'casa' => $casa,
            'calle' => $calle
        );

        return \Views::admin('expediente.create',$a_data_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); die();
        $validator = Validator::make($request->all(), [
            'nroexpediente' => "nullable",
            'padron'        => "nullable",
            'area'          => "nullable",
            "grupo"         => "nullable",
            "mz"            => "nullable",
            "lote"          => "nullable",
            "sublote"       => "nullable",
            "tipo"          => "nullable",
            "direccion"     => "nullable",
            // "padron"     => "nullable",
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }


        $croquis = $request->file('croquis');
        $extension = $croquis->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $extension;
        // list($width,$height) = getimagesize($file);
        
        Storage::disk('expediente')->put($fileName,  \File::get($croquis));

         
        $exp = new Expediente;
        $exp->nroPadron         = $request->input('padron');
        $exp->nroExpediente     = $request->input('nroexpediente');
        $exp->area              = $request->input('area');
        $exp->estado            = 1;
        $exp->nrLote            = $request->input('lote');
        $exp->nroSubLote        = $request->input('sublote');
        $exp->idCalle           = $request->input('tipo');
        $exp->nomDireccion      = $request->input('direccion');
        $exp->idVivencia        = $request->input('nvivencia');
        $exp->idCasa            = $request->input('ecasa');
        $exp->idSSHH            = $request->input('sshh');
        $exp->idPlantas         = $request->input('plantas');
        $exp->idTendero         = $request->input('tendedero');
        $exp->idRadio           = $request->input('radio');
        $exp->idRefrigerador    = $request->input('refrigeradora');
        $exp->idTelevisor       = $request->input('televisor');
        $exp->idSonido          = $request->input('esonido');
        $exp->anexo          = $request->input('anexo');
        $exp->sector          = $request->input('sector');
        $exp->vimprimida          = $request->input('vimprimida');
        $exp->vrecibida          = $request->input('vrecibida');
        $exp->otros             = $request->input('otros');
        $exp->aPlano            = $fileName;
        $exp->ccanjeada             = $request->input('ccanjeada');


        $exp->save();
        $expId = $exp->idExpediente;
        
        $manza = new Manzanas;
        $manza->nomManzana     = $request->input('mz');
        $manza->idGrupo        = $request->input('grupo');
        $manza->idExpediente   = $expId;
        $manza->save();
         
        return redirect()->route('admin.expe_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = DB::table('expediente')
        ->join('manzanas', 'expediente.idExpediente', '=', 'manzanas.idExpediente')
        ->join('grupo', 'grupo.idGrupo', '=', 'manzanas.idGrupo')
        ->where(['expediente.idExpediente'=> $id])
        ->first();

        // dd($expediente); die();

        $grupo = \Views::diccionario('idGrupo');
        $vivienda = \Views::diccionario('idVivencia');
        $casa = \Views::diccionario('idCasa');
        $sshh = \Views::diccionario('idSSHH');
        $calle = \Views::diccionario('idCalle');

        $a_data_page = array(
            'title'   => 'Editar de Expediente',
            'grupo'=> $grupo,
            'vivienda' => $vivienda,
            'sshh' => $sshh,
            'casa' => $casa,
            'calle' => $calle,
            'expediente' => $expediente
        );

        return \Views::admin('expediente.editar',$a_data_page);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nroexpediente' => "nullable",
            'padron'        => "nullable",
            'area'          => "nullable",
            "grupo"         => "nullable",
            "mz"            => "nullable",
            "lote"          => "nullable",
            "sublote"       => "nullable",
            "tipo"          => "nullable",
            "direccion"     => "nullable",
            // "padron"     => "nullable",
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

         
        // $exp = new Expediente;
        $exp = Expediente::find($id);
        $exp->nroPadron         = $request->input('padron');
        $exp->nroExpediente     = $request->input('nroexpediente');
        $exp->area              = $request->input('area');
        $exp->nrLote            = $request->input('lote');
        $exp->nroSubLote        = $request->input('sublote');
        $exp->idCalle           = $request->input('tipo');
        $exp->nomDireccion      = $request->input('direccion');
        $exp->idVivencia        = $request->input('nvivencia');
        $exp->idCasa            = $request->input('ecasa');
        $exp->idSSHH            = $request->input('sshh');
        $exp->idPlantas         = $request->input('plantas');
        $exp->idTendero         = $request->input('tendedero');
        $exp->idRadio           = $request->input('radio');
        $exp->idRefrigerador    = $request->input('refrigeradora');
        $exp->idTelevisor       = $request->input('televisor');
        $exp->idSonido          = $request->input('esonido');
        $exp->anexo             = $request->input('anexo');
        $exp->sector            = $request->input('sector');
        $exp->vimprimida        = $request->input('vimprimida');
        $exp->vrecibida         = $request->input('vrecibida');
        $exp->otros             = $request->input('otros');
        $exp->ccanjeada         = $request->input('ccanjeada');

        if($request->input('croquis')){
            $croquis = $request->file('croquis');
            $extension = $croquis->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            Storage::disk('expediente')->put($fileName,  \File::get($croquis));
            $exp->aPlano            = $fileName;
        }
        $exp->save();
        $expId = $exp->idExpediente;
        
        Manzanas::where(['idExpediente'=>$exp->idExpediente ])->update([
            'nomManzana'     => $request->input('mz'),
            'idGrupo'    => $request->input('grupo')
        ]);

        // $manza = new Manzanas;
        // $manza->nomManzana     = $request->input('mz');
        // $manza->idGrupo        = $request->input('grupo');
        // $manza->idExpediente   = $expId;
        // $manza->save();
         
        return redirect()->route('admin.expe_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
