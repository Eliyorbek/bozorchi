@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role == 1)
@livewire('boss.contact.contact-component')
@endif
@endsection