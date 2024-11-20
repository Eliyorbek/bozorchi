@extends('backend.inc.app')
@section('content')
    @livewire('boss.order.order-item' , ['id'=>$id])
@endsection