<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Adresse;
use App\Models\Estado;
use Illuminate\Support\Arr;

class MayoristaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$texto = trim($request->get('texto'));

        $mayoristas = User::mayor()->get();
        
        return view('mayorista.index', compact('mayoristas'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states  = DB::table('estados')->get(); 
               
        //dd($states);
        return view('mayorista.create', ['user' => new User], ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // sel validan los campos de las tablas relacionadas
        $rules = [
            'name' => 'required|min:5',
            'company' => 'required',
            'email' => 'required|email', 
            'phone' => 'required|max:10',
            'discount' => 'nullable',
            'contactname' => 'nullable',
            'address' => 'nullable',
            'postalcode' => 'nullable',
            'neighborhood' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'email2' => 'nullable',
            'phone2' => 'nullable',
            'IqualAddress' => 'nullable',
            'contactname2' => 'nullable',
            'address2' => 'nullable',
            'postalcode2' => 'nullable',
            'neighborhood2' => 'nullable',
            'city2' => 'nullable',
            'state2' => 'nullable',
            'email3' => 'nullable',
            'phone3' => 'nullable',
            'businessname' => 'nullable',
            'cfdi' => 'nullable',
            'rfc' => 'nullable',
        ];

        $active = $request->input('active') ?: []; 
        $IqualAdd = Arr::has($active, '0');
        
        $this->validate($request, $rules);

        // Creación del usuario
        $user = User::create(
            $request->only('name', 'company', 'email', 'phone', 'discount', 'businessname',
            'cfdi', 'rfc',)
            + [
                'role' => 'Mayorista',
                'status' => 1,
                'password' => bcrypt('password')
            ]
        );

        //Creación del registro de la direccion
        $user->Usraddress()->create([
            'contactname' => $request['contactname'],
            'address' => $request['address'],
            'postalcode' => $request['postalcode'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city1'],
            'state' => $request['state'],
            'email' => $request['email2'],
            'phone' => $request['phone'],
            'type' => 'Usuario',
            'status' => 1,
        ]);

        //Creación del registro de la direccion de la facturacion
        if($IqualAdd) // Se usara la dirección de envió
        {
            $user->Usrbillings()->create([
                'IqualAddress' => 1,
                'contactname' => $request['contactname'],
                'address' => $request['address'],
                'postalcode' => $request['postalcode'],
                'neighborhood' => $request['neighborhood'],
                'city' => $request['city1'],
                'state' => $request['state'],
                'email' => $request['email2'],
                'phone' => $request['phone'],
                'type' => 'Usuario',
                'status' => 1,
            ]);
        }else // se usara la dirección de Facturación
        {
            $user->Usrbillings()->create([
                'IqualAddress' => 0,
                'contactname' => $request['contactname2'],
                'address' => $request['address2'],
                'postalcode' => $request['postalcode2'],
                'neighborhood' => $request['neighborhood2'],
                'city' => $request['city2'],
                'state' => $request['state2'],
                'email' => $request['email3'],
                'phone' => $request['phone3'],
                'type' => 'Usuario',
                'status' => 1,
            ]);
        }
        

        return to_route('mayorista.index')->with("mensaje", "Mayorista guardado");;
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
