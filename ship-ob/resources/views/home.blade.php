@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($heroes as $h)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4>{{ $h->world->name }}</h4>
                            </li>
                            <li class="list-group-item">{{ $h->world->desc }}</li>
                            <li class="list-group-item">
                                <p>
                                    <i class="fa fa-user"></i> {{ $h->world->heroes()->count() }}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('world.view', ['idWorld' => $h->world->id]) }}">
                                    <button class="btn btn-primary">GO!</button>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
