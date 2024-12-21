@extends('backend.inc.app')
@section('content')
    @if (Auth::user()->role == 1)
    @livewire('game.game-component')
    @endif
@endsection