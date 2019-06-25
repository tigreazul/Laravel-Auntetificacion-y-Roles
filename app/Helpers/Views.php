<?php

Class Views{
    //Funciones::saluda()
    public static function load($vista){
        return view('admin.'.$vista);
    }

}