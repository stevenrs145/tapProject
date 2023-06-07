@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/pais.css') }}">

<div class="container">
    <div class="row">

        <div class="col-md-12 crud_pais">
                <div class="card">
                    <div class="card-header">Persona {{ $persona->id }}</div>
                    <div class="card-body">

                       
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                   
                                    <tr><th> Id </th><td> {{ $persona->id }} </td></tr><tr><th> Departamento Id </th><td> {{ $persona->depto_id }} </td></tr><tr><th> Nombre Completo </th><td> {{ $persona->nombre_completo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                        <a href="{{ url('/persona') }}" title="Back"><button class="btn btn-warning btn-informacion btn-sm" style="color:#fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/persona/' . $persona->id . '/edit') }}" title="Edit Persona"><button class="btn btn-primary btn-editar btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('persona' . '/' . $persona->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-peligro btn-sm" title="Delete Persona" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
