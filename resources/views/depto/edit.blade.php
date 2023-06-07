@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/pais.css') }}">

    <div class="container">
        <div class="row">

            <div class="col-md-12 crud_pais">
                <div class="card">
                    <div class="card-header">Editar Departamento #{{ $depto->id }}</div>
                    <div class="card-body">
                        

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/depto/' . $depto->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('depto.form', ['formMode' => 'edit'])

                        </form>
                        <a href="{{ url('/depto') }}" title="Back"><button class="btn btn-warning btn-informacion" style=" margin-top:-10vh; margin-left:12vh; color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
