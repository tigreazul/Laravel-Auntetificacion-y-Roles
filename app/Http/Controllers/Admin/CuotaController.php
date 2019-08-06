<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Cuota, Detallecuota
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class CuotaController extends Controller
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
        
        $mes = \Views::diccionario('idMes');
        $tcuota = \Views::diccionario('idTipoCuota');

        // $cuota =  DB::table('cuota')
        // ->get();

        $dcuota =  DB::table('detalle_cuota')->get();
        
        $cuota  = DB::select("select c.*,(SELECT valor FROM diccionario WHERE ubicacion = 'idTipoCuota' AND codigo = c.idTipoCuota ) from cuota c");

        dd($cuota);
        $a_data_page = array(
            'title' => 'Lista de Cuario',
            'mes'   => $mes,
            'tcuota'=> $tcuota,
            'cuota' => $cuota
        );

        return \Views::admin('cuota.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mes = \Views::diccionario('idMes');
        $tcuota = \Views::diccionario('idTipoCuota');


        $a_data_page = array(
            'title' => 'Registro de paginas',
            'mes'   => $mes,
            'tcuota'=> $tcuota
        );

        return \Views::admin('cuota.create',$a_data_page);
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
           'tipo_cuota' => "nullable",
           'anio'       => "nullable"
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }
        

        $mes    = $request->input('mes');
        $monto  = $request->input('monto');
        
        $arrCuota = array();
        foreach ($mes as $km => $vk) {
            foreach ($monto as $kmont => $vmont) {
                if($kmont === $km){
                    $arrCuota[] = array(
                        'mes'   => $vk,
                        'mont'  => $vmont
                    );
                }
            }
        }

        // dd($arrCuota); die();

        $cuota = new Cuota;
        $cuota->idTipoCuota = $request->input('tipo_cuota');
        $cuota->anio        = $request->input('anio');
        $cuota->save();
        $cuotaId = $cuota->idCuota;

        foreach ($arrCuota as $cuo) {
            $usu = new Detallecuota;
            $usu->idCuota     = $cuotaId;
            $usu->idMes       = $cuo['mes'];
            $usu->monto       = $cuo['mont'];
            $usu->estado      = 1;
            $usu->save();
        }


        
        return redirect()->route('admin.cuota_list');

        // return redirect()->route('admin.front_list');
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
        //
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
        //
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
