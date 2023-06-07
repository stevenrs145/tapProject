@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/pais.css') }}">

    <div class="container">
        <div class="row">
          
            <div class="col-12 crud_pais">
                <div class="card">
                    <div class="card-header">Pais</div>
                    <div class="card-body">
                        <a href="{{ url('/pais/create') }}" class="btn btn-success btn-sm btn-crear" title="Add New Pai">
                            <i class="fa fa-plus" aria-hidden="true"></i> NUEVO
                        </a>

                        <form method="GET" action="{{ url('/pais') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Id</th><th>Nombre Pais</th><th class="title_action">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pais as $item)
                                    <tr>
                                        
                                        <td>{{ $item->id }}</td><td>{{ $item->nomPais }}</td>
                                        <td class="form_buttoms">
                                            <a href="{{ url('/pais/' . $item->id) }}" title="View Pai"><button class="btn btn-info btn-informacion btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/pais/' . $item->id . '/edit') }}" title="Edit Pai"><button class="btn btn-primary btn-editar btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/pais' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-peligro btn-sm" title="Delete Pai" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pais->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
