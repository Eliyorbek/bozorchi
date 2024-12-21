@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role == 1)
@livewire('dp.delivery-price-component')
@endif
@endsection()