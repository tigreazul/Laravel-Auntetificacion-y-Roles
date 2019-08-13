<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\{
    Modulo, Pagina, Titular, Persona, Subtitular, Miembro
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use DB;

class TitularController extends Controller
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
        
        // $titular =  DB::select('titular.nroExpediente,titular.codigoTarjeta,titular.codigoTarjetero,titular.idTitular,persona.nombre,persona.apellidoMaterno,persona.apellidoPaterno,persona.dni')
        // ->table('titular')
        // ->join('persona', 'titular.idPersona', '=', 'persona.idPersona')
        // // ->where([
        // //     'Estado'   => 1
        // // ])
        // ->orderBy('titular.idTitular')
        // ->get();

        $titular  = DB::select("SELECT titular.nroExpediente,titular.codigoTarjeta,
        titular.codigoTarjetero,titular.idTitular,persona.nombre,persona.apellidoMaterno,persona.apellidoPaterno,persona.dni FROM titular 
        INNER JOIN persona ON persona.idPersona = titular.idPersona");

        // dd($titular); die();

        $a_data_page = array(
            'title' => 'Lista de Titular',
            'titular'=> $titular
        );

        return \Views::admin('titular.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $institucion    =  $this->diccionario('idInstruccion');
        $ingreso        =  $this->diccionario('idIngreso');
        $civil          =  $this->diccionario('idCivil');
        $relacion       =  $this->diccionario('idRelacion');
        $titular = array();
        $subtitular = array();
        $hogar = array();
        $hijos = array();

        $departamento =  DB::table('departamento')
        ->where([
            'estado'   => 1
        ])->orderBy('descripcion','DESC')->get();

        // dd($departamento);

        $a_data_page = array(
            'title'         => 'Registro de Titular',
            'institucion'   => $institucion,
            'ingreso'       => $ingreso,
            'civil'         => $civil,
            'relacion'      => $relacion,
            'departamento'  => $departamento,
            'titular'       => $titular,
            'subtitular'    => $subtitular,
            'hogar'         => $hogar,
            'hijos'         => $hijos
        );

        return \Views::admin('titular.create',$a_data_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $file = $request->file('copiaDni');
        // $nombre = $file->getClientOriginalName();
        // dd($request->all());
        // die();
        $validator = Validator::make($request->all(), [
        // $validator = $request->validate([
           'nombre'     => "required",
           'apaterno'   => "required",
           'amaterno'   => "required",
            "departamento" => "required",
            "provincia" => "required",
            "distrito"  => "required",
            "grado"     => "required",
            "fingreso"  => "required",
            "nroRecibo" => "required",
            "dni"       => "required|unique:personal",
            "ocupacion" => "required",
            "sexo"      => "required",
            "ecivil"    => "required",
            "esocio"    => "required",
            "ecarnet"    => "required",
            "ctarjeta"    => "required",
            'imagen'    => 'required',
            'copiaDni'  => 'required',
            'fichaPadron'  => 'required'
        ]);

        if ($validator->fails()) {    
            // return response()->json($validator->messages(), 200);
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();

        $cdni = $request->file('copiaDni');
        $tcdni = $cdni->getClientOriginalName();

        $fpadron = $request->file('fichaPadron');
        $tfpadron = $fpadron->getClientOriginalName();
        

        $perso = new Persona;
        $perso->nombre            = $request->input('nombre');
        $perso->apellidoPaterno   = $request->input('apaterno');
        $perso->apellidoMaterno   = $request->input('amaterno');
        $perso->fechaNacimiento   = $request->input('nacimiento');
        $perso->dni               = $request->input('dni');
        $perso->sexo              = $request->input('sexo');
        $perso->idInstruccion     = $request->input('grado');
        $perso->save();
        $persoId = $perso->idPersona;

        $titular = new Titular;
        $titular->idPersona     = $persoId;
        $titular->idCivil       = $request->input('ecivil');
        $titular->ocupacion     = $request->input('ocupacion');
        $titular->aFotografia   = $nombre;
        $titular->idIngreso     = $request->input('ingreso');
        $titular->estadoSocio   = $request->input('esocio');
        $titular->anioGestion   = 2019;
        $titular->nroRecibo     = $request->input('nroRecibo');
        $titular->fechaIngreso  = $request->input('fingreso');
        $titular->entregoCarnet = $request->input('ecarnet');
        $titular->codigoTarjeta = $request->input('ctarjeta');
        $titular->aDNI          = $tcdni;
        $titular->aExpediente   = $tfpadron;
        $titular->save();
        $titularid = $titular->ID;
        
        return redirect()->route('admin.titular_edit', $titularid);
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

        $titular = DB::table('titular')
            ->join('persona', 'titular.idPersona', '=', 'persona.idPersona')
            ->where(['idTitular'=> $id])
            ->first();

        // $subtitular =  DB::table('subtitular')
        // ->join('persona', 'subtitular.idPersona', '=', 'persona.idPersona')
        // ->where([
        //     'subtitular.idTitular'   => $id
        // ])->orderBy('idSubtitular','DESC')->get();
        
        $subtitular  = DB::select("SELECT subtitular.*,persona.*,departamento.descripcion AS 'departamento', provincia.descripcion AS 'provincia',distrito.descripcion AS 'distrito' from subtitular 
            INNER JOIN persona ON subtitular.idPersona = persona.idPersona
            INNER JOIN departamento ON departamento.id = SPLIT_STRING(subtitular.idUbigeo, '.', 1) 
            INNER JOIN provincia ON provincia.provID = SPLIT_STRING(subtitular.idUbigeo, '.', 2) 
            INNER JOIN distrito ON distrito.distID = SPLIT_STRING(subtitular.idUbigeo, '.', 3) 
            WHERE subtitular.idTitular = '$id' ORDER BY idSubtitular DESC");


        $hogar  = DB::select("SELECT miembro_hogar.*,persona.* ,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idRelacion' AND codigo = miembro_hogar.idRelacion ) AS 'relacion'
            from miembro_hogar 
            INNER JOIN persona  on miembro_hogar.idPersona = persona.idPersona
            WHERE miembro_hogar.idTitular = '$id'");


        $hijos =  DB::table('hijos')
            ->join('persona', 'hijos.idPersona', '=', 'persona.idPersona')
            ->where([
                'hijos.idTitular'   => $id
            ])->orderBy('idHijo','DESC')->get();

        // dd($hogar); die();

        $institucion    =  $this->diccionario('idInstruccion');
        $ingreso        =  $this->diccionario('idIngreso');
        $civil          =  $this->diccionario('idCivil');
        $relacion       =  $this->diccionario('idRelacion');


        $departamento =  DB::table('departamento')
        ->where([
            'estado'   => 1
        ])->orderBy('descripcion','DESC')->get();

        // dd($departamento);

        $a_data_page = array(
            'title'         => 'Editar de Titular',
            'institucion'   => $institucion,
            'ingreso'       => $ingreso,
            'civil'         => $civil,
            'relacion'      => $relacion,
            'departamento'  => $departamento,
            'titular'       => $titular,
            'subtitular'    => $subtitular,
            'hogar'         => $hogar,
            'hijos'         => $hijos
        );

        return \Views::admin('titular.editar.editar',$a_data_page);
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
            // $validator = $request->validate([
               'nombre'     => "required",
               'apaterno'   => "required",
               'amaterno'   => "required",
                "departamento" => "required",
                "provincia" => "required",
                "distrito"  => "required",
                "grado"     => "required",
                "fingreso"  => "required",
                "nroRecibo" => "required",
                "dni"       => "required",
                "ocupacion" => "required",
                "sexo"      => "required",
                "ecivil"    => "required",
                "esocio"    => "required",
                "ecarnet"    => "required",
                "ctarjeta"    => "required",
                // 'imagen'    => 'required',
                // 'copiaDni'  => 'required',
                // 'fichaPadron'  => 'required'
            ]);
    
            if ($validator->fails()) {    
                // return response()->json($validator->messages(), 200);
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }
    
            // $file = $request->file('imagen');
            // $nombre = $file->getClientOriginalName();
    
            // $cdni = $request->file('copiaDni');
            // $tcdni = $cdni->getClientOriginalName();
    
            // $fpadron = $request->file('fichaPadron');
            // $tfpadron = $fpadron->getClientOriginalName();
            
            $titular = Titular::find($id);
            $titular->idCivil       = $request->input('ecivil');
            $titular->ocupacion     = $request->input('ocupacion');
            // $titular->aFotografia   = $nombre;
            $titular->idIngreso     = $request->input('ingreso');
            $titular->estadoSocio   = $request->input('esocio');
            $titular->nroRecibo     = $request->input('nroRecibo');
            $titular->fechaIngreso  = $request->input('fingreso');
            $titular->entregoCarnet = $request->input('ecarnet');
            $titular->codigoTarjeta = $request->input('ctarjeta');
            // $titular->aDNI          = $tcdni;
            // $titular->aExpediente   = $tfpadron;
            $titular->save();
            $personaid = $titular->idPersona;

            // $perso = new Persona;
            $perso = Persona::find($personaid);
            $perso->nombre            = $request->input('nombre');
            $perso->apellidoPaterno   = $request->input('apaterno');
            $perso->apellidoMaterno   = $request->input('amaterno');
            $perso->fechaNacimiento   = $request->input('nacimiento');
            $perso->dni               = $request->input('dni');
            $perso->sexo              = $request->input('sexo');
            $perso->idInstruccion     = $request->input('grado');
            $perso->save();
            // $persoId = $perso->idPersona;
    
            
            return redirect()->route('titular.editar.editar', $id);
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


    private function diccionario($identificador)
    {
        $data =  DB::table('diccionario')
        ->where([
            'ubicacion'=> $identificador
        ])
        ->orderBy('codigo')
        ->get();

        return $data;
    }

    public function subdireccion(Request $request)
    {
        // dd($request->all());
        // die();
        $validator = Validator::make($request->all(), [
            "nombre"    => "required",
            "apaterno"  => "required",
            "amaterno"  => "required",
            "dni"       => "required",

            "sexo"       => "required",
            "grado"       => "required",

            "dptoSub"   => "required",
            "provSub"   => "required",
            "distSub"   => "required",
            "ocupacion" => "required",
            "civil"     => "required",
            "relacion"  => "required",
            "telefono"  => "required",
            "idTitular" => "required"
        ]);

        if ($validator->fails()) {    
            // return redirect()->back()->withErrors($validator->messages())->withInput();
            return response()->json($validator->messages(), 200);
        }


        $persona = new Persona;
        $persona->nombre            = $request->input('nombre');
        $persona->apellidoPaterno   = $request->input('apaterno');
        $persona->apellidoMaterno   = $request->input('amaterno');
        $persona->dni               = $request->input('dni');
        $persona->sexo              = $request->input('sexo');
        $persona->idInstruccion             = $request->input('grado');
        $persona->save();
        $personaId = $persona->idPersona;

        $subtitu = new Subtitular;
        $subtitu->idUbigeo    = $request->input('dptoSub').'.'.$request->input('provSub').'.'.$request->input('distSub');
        $subtitu->idPersona   = $personaId;
        $subtitu->ocupacion   = $request->input('ocupacion');
        $subtitu->idCivil     = $request->input('civil');
        $subtitu->idRelacion  = $request->input('relacion');
        $subtitu->telefono    = $request->input('telefono');
        $subtitu->idTitular   = $request->input('idTitular');
        $subtitu->save();
        $idSubTitu =  $subtitu->idSubtitular;
        $idTitu    =  $subtitu->idTitular;

        // return redirect()->route('admin.titular_edit', $titularid);

        // $subtitular =  DB::table('subtitular')
        // ->join('persona', 'subtitular.idPersona', '=', 'persona.idPersona')
        // ->where([
        //     'subtitular.idTitular'   => $idTitu
        // ])->orderBy('idSubtitular','DESC')->get();


        $subtitular  = DB::select("SELECT subtitular.*,persona.*,departamento.descripcion AS 'departamento', provincia.descripcion AS 'provincia',distrito.descripcion AS 'distrito' from subtitular 
            INNER JOIN persona ON subtitular.idPersona = persona.idPersona
            INNER JOIN departamento ON departamento.id = SPLIT_STRING(subtitular.idUbigeo, '.', 1) 
            INNER JOIN provincia ON provincia.provID = SPLIT_STRING(subtitular.idUbigeo, '.', 2) 
            INNER JOIN distrito ON distrito.distID = SPLIT_STRING(subtitular.idUbigeo, '.', 3) 
            WHERE subtitular.idTitular = '$idTitu' ORDER BY idSubtitular DESC");



        $data = array(
            'status' => true,
            'lst'    => $subtitular
        );
        return response()->json($data, 200);

    }

    public function habitan(Request $request)
    {
        // dd($request->all());
        // die();
        $validator = Validator::make($request->all(), [
            "nombre"    => "required",
            "apaterno"  => "required",
            "amaterno"  => "required",
            "dni"       => "required",

            "sexo"       => "required",
            "grado"       => "required",

            "dptoSub"   => "required",
            "provSub"   => "required",
            "distSub"   => "required",

            "relacion" => "required",
            "idTitular" => "required"
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }


        $persona = new Persona;
        $persona->nombre            = $request->input('nombre');
        $persona->apellidoPaterno   = $request->input('apaterno');
        $persona->apellidoMaterno   = $request->input('amaterno');
        $persona->dni               = $request->input('dni');
        $persona->sexo              = $request->input('sexo');
        $persona->idInstruccion             = $request->input('grado');
        $persona->save();
        $personaId = $persona->idPersona;

        $miembro = new Miembro;
        $miembro->idTitular   = $request->input('idTitular');
        $miembro->idPersona   = $personaId;
        $miembro->idRelacion  = $request->input('relacion');
        $miembro->save();

        $idmiembro =  $miembro->idmiembrolar;
        $idTitu    =  $miembro->idTitular;

        $miembro  = DB::select("SELECT miembro_hogar.*,persona.* ,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idRelacion' AND codigo = miembro_hogar.idRelacion ) AS 'relacion'
            from miembro_hogar 
            INNER JOIN persona  on miembro_hogar.idPersona = persona.idPersona
            WHERE miembro_hogar.idTitular = '$idTitu'");
        

        $data = array(
            'status' => true,
            'lst'    => $miembro
        );
        return response()->json($data, 200);

    }



    public function hijos(Request $request)
    {
        dd($request->all());
        die();
        $validator = Validator::make($request->all(), [
            "nombre"    => "required",
            "apaterno"  => "required",
            "amaterno"  => "required",
            "dni"       => "required",

            "sexo"       => "required",
            "grado"       => "required",

            "dptoSub"   => "required",
            "provSub"   => "required",
            "distSub"   => "required",

            "relacion" => "required",
            "idTitular" => "required"
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }


        $persona = new Persona;
        $persona->nombre            = $request->input('nombre');
        $persona->apellidoPaterno   = $request->input('apaterno');
        $persona->apellidoMaterno   = $request->input('amaterno');
        $persona->dni               = $request->input('dni');
        $persona->sexo              = $request->input('sexo');
        $persona->idInstruccion             = $request->input('grado');
        $persona->save();
        $personaId = $persona->idPersona;

        $miembro = new Miembro;
        $miembro->idTitular   = $request->input('idTitular');
        $miembro->idPersona   = $personaId;
        $miembro->idRelacion  = $request->input('relacion');
        $miembro->save();

        $idmiembro =  $miembro->idmiembrolar;
        $idTitu    =  $miembro->idTitular;

        $miembro  = DB::select("SELECT miembro_hogar.*,persona.* ,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idRelacion' AND codigo = miembro_hogar.idRelacion ) AS 'relacion'
            from miembro_hogar 
            INNER JOIN persona  on miembro_hogar.idPersona = persona.idPersona
            WHERE miembro_hogar.idTitular = '$idTitu'");
        

        $data = array(
            'status' => true,
            'lst'    => $miembro
        );
        return response()->json($data, 200);

    }

}

