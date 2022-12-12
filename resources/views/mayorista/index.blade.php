@extends('layouts.maestra')
@section('titulo', 'Mayoristas')
@section('styles')
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section("contenido")

<div class="card shadow mb-4">
    <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="mb-0">Mayoristas <i class="fa fa-box"></i></h2>
          </div>
          <div class="col text-right">
            <a href="{{ route('mayorista.create') }}" class="btn btn-success mb-2">
              Nuevo mayorista
            </a>
          </div>
        </div>
      </div>

      @if(session('notification'))
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                @include('layouts.notificacion')
            </div>       
        </div>
      @endif    
      
    </div>
    
    <div style="margin: 10px"></div>
    
    <div class="table-responsive">        
        <table id="mayoristas" class="table align-items-center table-flush data-table" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Correo eléctronico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">No. cotizaciones</th>
                    <th scope="col">No. ordenes</th>
                    <th scope="col">No. solicitudes</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mayoristas as $mayor)
                    <tr>
                        <th scope="row">
                            {{ $mayor->id }}
                        </th>
                        <th scope="row">
                            {{ $mayor->name }}
                        </th>
                        <th scope="row">
                            {{ $mayor->company }}
                        </th>
                        <td>
                            {{ $mayor->email }}
                        </td>
                        <td>
                            {{ $mayor->phone }}
                        </td>
                        <td>
                            {{ $mayor->discount }}
                        </td>
                        <td>
                            0
                        </td>
                        <td>
                            0
                        </td>
                        <td>
                            0
                        </td>

                        <td>
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="#" class="btn btn-warning" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                                                       
                    </tr>
                @endforeach
                
            </tbody>

        </table>
        <div class="card-body">
        </div>       
    </div>
    
</div>
@endsection
                    
@section('scripts')   
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
            $('#mayoristas').DataTable({
            language: {
                'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                "info": "(_TOTAL_) Registros",
              },
            
        });
    });
</script>
@endsection
