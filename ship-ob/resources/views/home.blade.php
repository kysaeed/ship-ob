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
                        <p>{{ $h->world->name }}</p>
                        <p>{{ $h->world->desc }}</p>
                        <a href="{{ route('world.view', ['idWorld' => $h->world->id]) }}">
                            <button class="btn btn-primary">GO!</button>
                        </a>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
