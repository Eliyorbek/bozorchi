@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role==1)
@livewire('boss.delivery.delivery-component')
@endif
@endsection