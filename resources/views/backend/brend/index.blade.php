@extends('backend.inc.app')
@section('content')
   @if (Auth::user()->role == 1)
   @livewire('boss.brend.brend-component')
   @endif
@endsection
