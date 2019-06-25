<?php

Class Views{
    
    // public $data_view()
    public static function load($vista){
        return view($vista);
    }

    public static function admin($vista)
    {

        
        // dd($arr); die();
		// return !empty($arr)? $arr: array();


        // $_data_menu = DB::table('pagina')->select('*',DB::raw('modulo.Titulo'))
        // ->leftJoin('modulo', function($join){
        //     $join->on('modulo.ID', '=', 'pagina.ModuloID');
        // })
        // ->orderBy('modulo.ID')
        // ->get();
            
        // if(count($_data_menu) == 0)
        // {
            $_data_menu = $vista;
        // }

        $_data = array  (
            'title'     => 'Panel de administración',
            'data_menu' => $_data_menu
        );

        return view('admin.'.$vista,$_data);
    }

    public static function menu($vista = null)
    {
        foreach (self::get_module() as $value) {
			$arr[] = array(
				'modulo' 	=> $value->Descripcion,
                'icono' 	=> $value->Icono,
                'link'      => $value->Link,
                'externo'   => $value->LinkExterno,
                'vista'     => $value->Route,
                'page'      => $vista,
				'interno' 	=> self::get_page($value->ID)
			);
        }
        return !empty($arr)? $arr: array();
    }

    public static function get_module()
    {
        $_data_module = DB::table('modulo')
            ->where([
                'Estado' => 1
            ])->get();
        return $_data_module;
    }

    public static function get_page($modulo = null)
    {
        $_data_page = DB::table('pagina')
            ->where([
                'ModuloID' => $modulo,
                'Estado'   => 1
            ])
            ->get();

            foreach ($_data_page as $val) {
                $arr_page[] = array(
                    'cabecera' 	=> $val->Descripcion,
                    'ruta' 		=> $val->Ruta,
                    'icono' 	=> '',
                    'id' 		=> $val->ID,
                    'submenu'   => ''
                    // 'submenu' 	=> get_padre_pag($modulo,$val->ID),
                );
            }
        return (!empty($arr_page)? $arr_page : array());
    }


    public static function segment($indicador = 0)
    {
        if($indicador === 1)
        {
            return Request::segment(2);
        }else{
            return Request::segment(1).'/'.Request::segment(2);
        }
    }

}