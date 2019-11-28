@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Actividades</div>
                    <div class="card-body">
                        <a href="{{ url('/actividades/create') }}" class="btn btn-success btn-sm" title="Add New Actividade">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/actividades') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
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
                                        <th>#</th><th>Empleado Id</th><th>Tipo De Tarea</th><th>Fecha De Inicio</th><th>Fecha De Finalizacion</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($actividades as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->empleado_id }}</td><td>{{ $item->tipo_de_tarea }}</td><td>{{ $item->fecha_de_inicio }}</td><td>{{ $item->fecha_de_finalizacion }}</td>

                                        <td>
                                            <a href="{{ url('/actividades/' . $item->id) }}" title="View Actividade"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/actividades/' . $item->id . '/edit') }}" title="Edit Actividade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/actividades' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Actividade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $actividades->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
