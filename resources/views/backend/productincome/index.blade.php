@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role == 1)
@livewire('boss.productincome.product-income-component')
@endif
@endsection
