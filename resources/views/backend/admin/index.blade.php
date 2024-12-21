@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role==1)
@livewire('admins.admin-component')
@endif
@endsection
