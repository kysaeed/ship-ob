@extends('layouts.app')

@push('scripts')
<script src="{{ asset(mix('js/dashboard.js')) }}" defer></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="app">
                        <world-manager-view :world-list='@json($worldList)'></world-manager-view>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
