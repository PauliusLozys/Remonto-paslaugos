@extends('layouts.app')

@section('navigation-bar')
    <a href="{{ route('home')}}"><button type="button"class="navButtons" >Atgal</button></a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Užregistruoti itaisai</div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prieigos kodas</th>
                            <th scope="col">Ar sutvarkytas</th>
                            <th scope="col">Ar atsiimtas</th>
                            <th scope="col">Remontininkas</th>
                            @can('user-repairman')
                                <th scope="col">Veiksmai</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->public_access }}</td>
                                <td>{{ $device->is_repaired ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->is_withdrawn ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->repairman->name ?? 'Nepriskirtas' }}</td>
                                <td>
     
                                @if($device->repairman_id == null)
                                    @can('user-repairman')
                                    <form action="{{ route('device.update', $device->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <button type="submit" class="btn btn-primary">Atsižymėti</button>
                                    </form>
                                    @endcan
                                @endif
                                    
                                </td>

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
