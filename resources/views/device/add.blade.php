@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registracija</div>

                <div class="card-body">
                    <center>
                        <form action="{{ route('device.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark">
                                Užregistruoti
                            </button>
                        </form>

                        @isset($public_access_key)
                            <label for="noOne">Sugeneruotas prieigos kodas: <span style="color: red">{{ $public_access_key }}</span></label>
                        @endisset
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
