@extends('layouts.app')

@section('navigation-bar')
    <a href="{{ route('home')}}"><button type="button"class="navButtons" >Atgal</button></a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                    <div class="card-header">Ieškoti įtaiso 
                        <form action="{{ route('device.searchNotRepaired') }}" method="POST">
                            @csrf
                            <p>Prieigos kodas:  
                                <input type="text" name="searchBar"> 
                                <button type="submit" class="btn btn-primary">Ieškoti</button>
                            </p>
                        </form>
                    </div>
                </center>
                <div class="card-body">

                    @if($devices->first() == null && isset($foundDevice)) 
                        <center>
                            <h2 style="color: red"> Įtaisas nerastas</h2>
                        </center>
                    @else

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
                                        @if($device->is_repaired)
                                            <p style="color: red">Šis įtaisas jau sutaisytas</p>
                                        @else
                                            <form action="{{ route('device.update', $device->id) }}" method="POST" class="float-left">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <button type="submit" class="btn btn-primary">Atsižymėti</button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
