@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naudotojai</div>

                <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vardas</th>
                                <th scope="col">El. Laiskas</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role()->get()->pluck('name')[0] }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <button type="button" class="btn btn-primary">Redaguoti</button>
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-warning">Šalinti</button>
                                        </form>
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
