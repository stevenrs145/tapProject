@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/pais.css') }}">

    <div class="container">
        <div class="row">
          
            <div class="col-12 crud_pais">
                <div class="card">
                    <div class="card-header">Departamento</div>
                    <div class="card-body">
                        <a href="{{ url('/depto/create') }}" class="btn btn-success btn-crear btn-sm" title="Add New Depto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>

                        <form method="GET" action="{{ url('/depto') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary btn-crear" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th><th>Pais Id</th><th>Nombre Departamento</th><th class="title_action">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($depto as $item)
                                    <tr>
                                        
                                        <td>{{ $item->id }}</td><td>{{ $item->pais_id }}</td><td>{{ $item->nomDepto }}</td>
                                        <td class="form_buttoms">
                                            <a href="{{ url('/depto/' . $item->id) }}" title="View Depto"><button class="btn btn-info btn-informacion btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/depto/' . $item->id . '/edit') }}" title="Edit Depto"><button class="btn btn-primary btn-editar btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/depto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-peligro btn-sm" title="Delete Depto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $depto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
