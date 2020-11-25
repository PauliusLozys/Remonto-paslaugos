@extends('layouts.app')

@section('navigation-bar')
    <a href="{{ route('device.statistics')}}"><button type="button"class="navButtons" >Atgal</button></a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tableName }}</div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prieigos kodas</th>
                            <th scope="col">Ar sutvarkytas</th>
                            <th scope="col">Ar atsiimtas</th>
                            <th scope="col">Remontininkas</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $device)
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->public_access }}</td>
                                <td>{{ $device->is_repaired ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->is_withdrawn ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->repairman->name ?? 'Nepriskirtas' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
