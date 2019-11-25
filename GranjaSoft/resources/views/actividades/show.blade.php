@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Actividade {{ $actividade->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/actividades') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/actividades/' . $actividade->id . '/edit') }}" title="Edit Actividade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('actividades' . '/' . $actividade->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Actividade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $actividade->id }}</td>
                                    </tr>
                                    <tr><th> Activida Id </th><td> {{ $actividade->activida_id }} </td></tr><tr><th> Nombre </th><td> {{ $actividade->nombre }} </td></tr><tr><th> Empleado </th><td> {{ $actividade->empleado }} </td></tr><tr><th> Actividad </th><td> {{ $actividade->actividad }} </td>
                                    <tr><th> Dia </th><td> {{ $actividade->dia }} </td>
                                    <tr><th> Hora Inicio </th><td> {{ $actividade->hora_inicio }} </td>
                                    <tr><th> Hora Finaliza </th><td> {{ $actividade->hora_finaliza }} </td>   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
