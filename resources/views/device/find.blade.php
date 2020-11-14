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
            <h1>Ieškoti įtaiso</h1>

            <form action="{{ route('device.findDevice') }}" method="POST">
                @csrf
                <input type="text" name="searchBar">
                <button type="submit" class="btn btn-primary">
                    Ieškoti
                </button>
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