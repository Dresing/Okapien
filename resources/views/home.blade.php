@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Keys</div>

                <div class="panel-body">
                    <p>I denne sektion finder du alle dine nøgler til API'en.</p>
                </div>
                <table class="table table-striped table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>Key</th>
                        <th>Secret</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($keys as $key)
                        <tr>
                            <td>{{$key->api_key}}</td>
                            <td>{{$key->secret}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Brugere</div>

                <div class="panel-body">
                    <p>I denne sektion finder du alle brugere.</p>
                </div>
                <table class="table table-striped table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Navn</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
