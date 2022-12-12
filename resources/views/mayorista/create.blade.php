@extends("layouts.maestra")
@section("titulo", "Agregar mayorista")

@section("styles")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
<script src="{{ asset('vendor/jquery/dist/jquery-3.6.1.min.js') }}" type="text/javascript"></script>   
@endsection

@section("contenido")

<form name="mayorista" action="{{ route('mayorista.store') }}" method="post">
    @csrf

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo mayorista</h3>
                </div>
                <div class="col text-right">

                    <button type="submit" class="btn btn-primary mb-2">
                        Guardar Información
                    </button>

                    <a href="/mayorista" class="btn btn-danger mb-2">
                        Cancelar
                    </a>
                    
                </div>
            </div>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6"> 
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            required autocomplete="off" placeholder="Introduzca el nombre" autofocus>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="company">Empresa</label>
                        <input type="text" name="company" class="form-control" required autocomplete="off"
                            value="{{ old('company', $user->company) }}" required placeholder="Ingrese la compañia">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="email">Correo eléctronico</label>
                        <input type="text" name="email" class="form-control" required autocomplete="off"
                            value="{{ old('email', $user->email) }}" required placeholder="Introduzca el email">
                    </div>
                <div class="col-12 col-sm-6">
                    <label for="phone">Número de teléfono</label>
                        <input type="text" name="phone" class="form-control" required autocomplete="off"
                            value="{{ old('phone', $user->phone) }}" required placeholder="Ingrese el número de teléfono">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="discount">Porcentaje de descuento</label>
                        <input type="decimal(9,2)" name="discount" class="form-control" autocomplete="off"
                            value="{{ old('discount', $user->discount) }}" placeholder="Ingrese el descuento">
                    </div>
                </div>
            </div> 
            
        </div>
    </div>

    <div style="margin: 10px"></div>

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="mb-0">Dirección de envió</h4>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6"> 
                        <label for="name">Nombre de contacto</label>
                        <input type="text" name="contactname" class="form-control" value="{{ old('contactname') }}"
                            autocomplete="off" placeholder="Escribe nombre de contacto">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="company">Dirección</label>
                        <input type="text" name="address" class="form-control" autocomplete="off"
                            value="{{ old('address') }}" placeholder="ingresa la dirección">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6"> 
                        <label for="code1">Código Postal</label>
                        <input type="text" id="code1" name="postalcode" class="form-control" value="{{ old('PostalCode') }}"
                            autocomplete="off" placeholder="Escribe el código postal">
                    </div>
                    
                    <div class="col-12 col-sm-6">                        
                        <label for="city1">Ciudad</label>
                        <select name="city1" id="city1" class="form-control selectpicker" data-style="btn-default">
                            
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">                    
                    <div class="col-12 col-sm-6">                        
                        <label for="colon1">Colonia</label>
                        <select name="neighborhood" id="colon1" class="form-control selectpicker" data-style="btn-default">
                            
                        </select>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">                        
                            <label for="state1">Estado</label>
                            <select name="state" id="state1" class="form-control selectpicker" data-style="btn-primary mb-2" title="Seleccipone un estado...">
                                                              
                            </select>
                        </div
                    </div>                    
                </div>                
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6"> 
                        <label for="email2">Correo eléctronico</label>
                        <input type="text" name="email2" class="form-control" value="{{ old('email') }}"
                            autocomplete="off" placeholder="Escribe el email">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="phone2">Teléfono</label>
                        <input type="text" name="phone2" class="form-control" autocomplete="off"
                            value="{{ old('phone') }}" placeholder="Escribe el teléfono">
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    </div>

    <div style="margin: 10px"></div>

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="mb-0">Dirección de facturación</h4>
                </div>
                <div class="col text-right">
                    <div class="form-check">
                        <input class="form-check-input" 
                        type="checkbox" name="active[]" 
                        id="IqualAddress" value="1"
                        onchange="javascript:showContent()">
                        <label class="form-check-label" for="IqualAddress">Usar dirección de envió</label>
                    </div>

                </div>
            </div>
        </div>

        
        <div class="card-body">
            <div id="datosfacturacion">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> 
                            <label for="name">Nombre de contacto</label>
                            <input type="text" name="contactname2" class="form-control" value="{{ old('contactname') }}"
                                autocomplete="off" placeholder="Escribe nombre de contacto">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="company">Dirección</label>
                            <input type="text" name="address2" class="form-control" autocomplete="off"
                                value="{{ old('address') }}" placeholder="ingresa la dirección">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> 
                            <label for="code2">Código Postal</label>
                            <input type="text" name="postalcode2" id="code2" class="form-control" value="{{ old('PostalCode') }}"
                                autocomplete="off" placeholder="Escribe el código postal">
                        </div>

                        <div class="col-12 col-sm-6">                        
                            <label for="city2">Ciudad</label>
                            <select name="city2" id="city2" class="form-control selectpicker" data-style="btn-default" title="Seleccione una o varias">

                            </select>
                        </div>                    
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">                        
                            <label for="colon2">Colonia</label>
                            <select name="neighborhood2" id="colon2" class="form-control selectpicker" data-style="btn-default" title="Seleccione una o varias">

                            </select>
                        </div>

                        <div class="col-12 col-sm-6">                        
                            <label for="state2">Estado</label>
                            <select name="state2" id="state2" class="form-control selectpicker" data-style="btn-default" title="Seleccione una o varias">
                                <option value=""></option>
                                @foreach($states as $state)
                                    <option value="{{ $state->nombreestado }}">{{ $state->nombreestado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6"> 
                            <label for="email3">Correo eléctronico</label>
                            <input type="text" name="email3" class="form-control" value="{{ old('email') }}"
                                autocomplete="off" placeholder="Escribe el email">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="phone3">Teléfono</label>
                            <input type="text" name="phone3" class="form-control" autocomplete="off"
                                value="{{ old('phone') }}" placeholder="Escribe el teléfono">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div style="margin: 10px"></div>

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="mb-0">Datos de facturación</h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6"> 
                        <label for="name">Razón social</label>
                        <input type="text" name="businessname" class="form-control" value="{{ old('BusinessName') }}"
                            autocomplete="off" placeholder="Escriba la razón social">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="company">Uso de CFDI</label>
                        <input type="text" name="cfdi" class="form-control" autocomplete="off"
                            value="{{ old('cfdi') }}" placeholder="ingresa el Uso del CDFI">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="company">RFC</label>
                        <input type="text" name="rfc" class="form-control" autocomplete="off"
                            value="{{ old('rfc') }}" placeholder="Escribe el RFC">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("layouts.notificacion")
</form>
@endsection

@section("scripts")

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

    <script src="{{ asset('/js/mayorista/create.js') }}"></script>
@endsection

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("datosfacturacion");
        check = document.getElementById("IqualAddress");
        if (check.checked) {
            element.style.display='none';
        }
        else {
            
            element.style.display='block';
        }
    }
</script>