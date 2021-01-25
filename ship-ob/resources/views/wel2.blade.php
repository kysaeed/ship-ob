@extends('layouts.app')

@section('content')
<div >
    <div id="app">
        <ship-world-view :world-info="{{ $worldInfo }}"></ship-world-view>
    </div>
</div>
@endsection
