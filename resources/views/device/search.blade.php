@extends('layouts.app')

@section('navigation-bar')
    <a href="{{ route('home')}}"><button type="button"class="navButtons" >Atgal</button></a>
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                <div class="card-header">Ieškoti įtaiso 
                    <form action="{{ route('device.searchDevice') }}" method="POST">
                        @csrf
                        <p>Prieigos kodas:  
                            <input type="text" name="searchBar"> 
                            <button type="submit" class="btn btn-primary">Ieškoti</button>
                        </p>
                    </form>
                </div>
                </center>


                <div class="card-body">

                    @isset($foundDevice)
                    @if($device != null)
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
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td>{{ $device->public_access }}</td>
                                <td>{{ $device->is_repaired ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->is_withdrawn ? 'Taip' : 'Ne'}}</td>
                                <td>{{ $device->repairman->name ?? 'Nepriskirtas' }}</td>
                                <td>
                                    @if($device->is_withdrawn)
                                        <span style="color: red">Įtaisas jau atsiimtas</span>
                                    @else
                                        <form action="{{ route('device.searchUpdate', $device->id) }}" method="POST" class="float-left">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Atsižymėti</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <center>
                        <p style="color: red; font-weight: bold">ĮTAISAS NERASTAS</p>
                    </center>
                    @endif
                @endisset
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
