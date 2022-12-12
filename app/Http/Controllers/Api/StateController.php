<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\CodPostal;
use App\Models\Colonia;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function states($codpos)
    {
        $estado = CodPostal::join("estados","codpostales.cestado","=","estados.cestado")
        ->where("codpostales.ccp","=",$codpos)
        ->select("estados.cestado", "estados.nombreestado")
        ->orderBy("estados.nombreestado", "ASC")->get()->toJson();
 
        //dd($users);
        return $estado;
    }

    public function citys($codstate)
    {
        $ciudad = Ciudad::join("estados", "estados.cestado", "=", "ciudades.cestado")
        ->where("ciudades.cestado", "=", $codstate)
        ->select("ciudades.cmunicipio", "ciudades.descripcion")
        ->orderBy("ciudades.descripcion", "ASC")->get()->toJson();

        //dd($ciudad);
        return $ciudad;
    }

    public function colonias($codpos)
    {
        $colonia = Colonia::join("codpostales", "codpostales.ccp", "=", "colonias.ccodigopostal")
        ->where("codpostales.ccp","=",$codpos)
        ->select("colonias.cnombreasentamiento")
        ->orderBy("colonias.cnombreasentamiento", "ASC")->get()->toJson();

        //dd($colonia);
        return $colonia;
    }
}
