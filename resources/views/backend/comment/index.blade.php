@extends('backend.inc.app')
@section('content')
@if (Auth::user()->role == 1)
@livewire('comment.comment-component')
@endif
@endsection