@extends('layouts.app')

@section('title', 'DESA DALISODO')

@section('navbar')
    @include('components.navbar')
@endsection
@section('content')
    @include('components.header')
    @include('components.about')
    @include('components.potention')
    @include('components.event')
    @include('components.team')
    @include('components.location')
    @include('components.backToTop')
@endsection
@section('footer')
    @include('components.footer')
@endsection
