<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ieškoti įtaiso</title>
</head>
<body>

    <div>
        <center>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h1>Ieškoti įtaiso</h1>

            <form action="{{ route('device.findDevice') }}" method="POST">
                @csrf
                <p>Prieigos kodas:  <input type="text" name="searchBar" id="searchBar"></p>
                <button type="submit" class="btn btn-primary">
                    Ieškoti
                </button>
                <a href="{{ url('/')}}"><button type="button"class="navButtons" >Atgal</button></a>
            </form>

            @isset($foundDevice)
                @if($device != null)
                   <p> Prieigos kodas: {{ $device->public_access }}</p>
                   <p> Būsena: {{ $device->is_repaired ? 'Sutvarkytas' : 'Nesutvarkytas' }}</p>
                   <p> Atsiimtas: {{ $device->is_withdrawn ? 'Atsiimtas' : 'Neatsiimtas'  }}</p>
                @else
                    <p style="color: red; font-weight: bold">ĮTAISAS NERASTAS</p>
                @endif
            @endisset
           </center>
    </div>
</body>
</html>