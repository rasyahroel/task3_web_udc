@extends('layouts.mainlayout')

@section('title', 'Home')

@section('content')
    <h1>Ini adalah Home</h1>
    <h2>Welcome, {{ Auth::user()->name }}!! Anda adalah {{ Auth::user()->role->name }}</h2>
@endsection
