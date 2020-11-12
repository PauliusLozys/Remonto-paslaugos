@extends('layouts.app')

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
                            <th scope="col">Veiksmai</th>
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
                                    TODO: buttons
                                    {{-- <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary">Redaguoti</button>
                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning">�alinti</button>
                                    </form> --}}
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
