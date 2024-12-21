@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role==1)
@livewire('about.about-component')
@endif
@endsection