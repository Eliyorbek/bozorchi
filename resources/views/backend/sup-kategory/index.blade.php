@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role == 1)
@livewire('boss.sup-category.sup-category-component')
@endif
@endsection