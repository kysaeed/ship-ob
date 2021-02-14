@extends('layouts.app')

@push('scripts')
<script src="{{ asset(mix('js/world.js')) }}" defer></script>
@endpush

@section('content')
<div >
    <div id="app">
        <ship-world-view :world-info='@json($worldInfo)'></ship-world-view>
    </div>
</div>
@endsection
