<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Pdf;

class ReporteController extends Controller
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
        
        $frontend =  DB::table('frontend')
        ->where([
            'Estado'   => 1
        ])
        ->orderBy('ID')
        ->get();

        $grupo = \Views::diccionario('idGrupo');

        $a_data_page = array(
            'title' => 'Lista de Socios',
            'buscardor'=> $frontend,
            'grupo' => $grupo
        );

        return \Views::admin('reporte.index',$a_data_page);
    }

    public function expediente(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        $tcuota = \Views::diccionario('idTipoCuota');
        $buscardor = array();
        
        $a_data_page = array(
            'title' => 'Lista de Socios',
            'buscardor'=> $buscardor
        );

        return \Views::admin('reporte.expediente',$a_data_page);
    }

    public function validaBusquedaSocio(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'manzanas' => "nullable",
            "grupo"    => "nullable"
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        $manzanas   =  $request->input('manzanas');
        $grupo      =  $request->input('grupo');

        if(!is_null($manzanas))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE manzanas.nomManzana = '$manzanas'");
            if(!empty($vSearch)){
                return redirect()->route('admin.socio_create_search', $manzanas);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_list');
            }
        }

        if(!is_null($grupo))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE grupo.idGrupo = '$grupo'");
            if(!empty($vSearch)){
                return redirect()->route('admin.socio_create_search', $grupo);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_list');
            }
        }

        if(empty($grupo) || empty($manzanas)){
            \Session::flash('message', 'El numero ingresado no existe ');
            return redirect()->route('admin.report_list');
        }

    }

    public function busquedaSocio(Request $request,$id)
    {

        $vSearch  = DB::select("SELECT expediente.idExpediente,expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,
            persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE grupo.idGrupo = '$id' OR  manzanas.nomManzana = '$id'");

        $grupo = \Views::diccionario('idGrupo');


        $a_data_page = array(
            'title'     => 'Registro de paginas',
            'dato'      => $id,
            'grupo'     => $grupo,
            'buscardor' => $vSearch
        );

        return \Views::admin('reporte.index',$a_data_page);
    }

    public function validaBusquedaExpediente(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'buscador' => "nullable",
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        $buscador   =  $request->input('buscador');

        if(!is_null($buscador))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE expediente.nroExpediente = '$buscador'");
            if(!empty($vSearch)){
                return redirect()->route('admin.exp_create_search', $buscador);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_exp');
            }
        }

        if(empty($grupo) || empty($manzanas)){
            \Session::flash('message', 'El numero ingresado no existe ');
            return redirect()->route('admin.report_exp');
        }

    }

    public function busquedaExpediente(Request $request,$id)
    {

        $vSearch  = DB::select("SELECT expediente.idExpediente,expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,
            persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE expediente.nroExpediente = '$id'");

        // $grupo = \Views::diccionario('idGrupo');


        $a_data_page = array(
            'title'     => 'Registro de paginas',
            'dato'      => $id,
            // 'grupo'     => $grupo,
            'buscardor' => $vSearch
        );

        return \Views::admin('reporte.expediente',$a_data_page);
    }

    


    public function reporteSocio(Request $request,$id){
        header('Content-type: application/pdf');

        $vSearch  = DB::select("SELECT expediente.idExpediente,expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,
            persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE grupo.idGrupo = '$id' OR  manzanas.nomManzana = '$id'");

        // dd($provider);
        $pdf = new Pdf;
        $pdf->AliasNbPages();
		$pdf->SetFont('Arial','',10);
		$pdf->AddPage();
		$pdf->Ln(4);

		//****************************************
		//****************************************

		$pdf->SetFillColor(205,205,205);//color de fondo tabla
            $pdf->SetTextColor(10);
            $pdf->SetDrawColor(153,153,153);
            $pdf->SetLineWidth(.3);
            $pdf->SetFont('Arial','B',9);
            $pdf->SetFillColor(205,205,205);
            $pdf->Cell(45,6,'GRUPO',1,0,'L',true);        
            $pdf->SetFillColor(255,255,255);    
            $pdf->MultiCell( 140, 6, utf8_decode($vSearch[0]->nomGrupo), 1,'L',true); 
            $pdf->SetFont('Arial','B',9);
            $pdf->SetFillColor(255,255,255);    
            
        $pdf->Ln(3);
		
		//****************************************
		// DATOS 
		//****************************************
		//TITULO
		$pdf->SetFont('Arial','B',9);
		$pdf->SetFillColor(205,205,205);	
		$pdf->Cell(185,8,utf8_decode('LISTA DE SOCIOS'),1,0,'L',true);
		$pdf->SetFillColor(205,205,205);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B',8);
		$w = array(7, 25,60,60,33);
		$pdf->Cell($w[0],6,utf8_decode('#'),1,0,'L',true);
		$pdf->Cell($w[1],6,utf8_decode('EXPEDIENTE'),1,0,'L',true);
		$pdf->Cell($w[2],6,utf8_decode('NOMBRE Y APELLIDOS'),1,0,'L',true);
		$pdf->Cell($w[3],6,utf8_decode('DIRECCIÓN'),1,0,'L',true);
		$pdf->Cell($w[4],6,utf8_decode('MANZANA'),1,0,'L',true);
		$pdf->Ln();
		
		// Restauración de colores y fuentes
		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial','',7);
		// // Datos
		$fill = false;
        $contador = 0;
        foreach ($vSearch as $search) {
			$contador++;
            $linea = 0;
            
			if($contador == 21){
				$pdf->Cell(array_sum($w),0,'','T');
				$pdf->AddPage();
				$linea = 0;
			}else{
				$linea++;
			}
						
			if($linea!= 0 && $linea%58==0 ){
				$pdf->Cell(array_sum($w),0,'','T');
				$pdf->AddPage();
			}
	
			$pdf->Cell($w[0],5,$contador,'LR',0,'L');
			$pdf->Cell($w[1],5,$search->nroExpediente,'LR',0,'L');
            $pdf->Cell($w[2],5,$search->apellidoPaterno.' '.$search->apellidoMaterno.' '.$search->nombre,'LR',0,'L');
			$pdf->Cell($w[3],5,$search->nomDireccion,'LR',0,'L');
			$pdf->Cell($w[4],5,$search->nomManzana,'LR',0,'L');
			$pdf->Ln();
			$fill = !$fill;
        }
		// // Línea de cierre
		$pdf->Cell(array_sum($w),0,'','T');
		$pdf->Ln();
		
        $modo="I"; 
        $nombre_archivo = "LISTA_SOCIOS.pdf"; 
        $pdf->Output($nombre_archivo,$modo);
        exit;
    }

}
