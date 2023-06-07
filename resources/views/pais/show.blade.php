@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/pais.css') }}">

    <div class="container">
        <div class="row">

            <div class="col-md-12 crud_pais">
                <div class="card">
                    <div class="card-header" >Pais {{ $pai->id }}</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pai->id }}</td>
                                    </tr>
                                    <tr><th> Nombre pais </th><td> {{ $pai->nomPais }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <a href="{{ url('/pais') }}" title="Back"><button class="btn btn-warning btn-informacion btn-sm" style="color:#fff;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/pais/' . $pai->id . '/edit') }}" title="Edit Pai"><button class="btn btn-primary btn-editar btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('pais' . '/' . $pai->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-peligro btn-sm" title="Delete Pai" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
