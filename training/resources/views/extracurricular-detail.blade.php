@extends('layouts.mainlayout')

@section('title', "$ekskul->name")

@section('content')
    <h2>Anda sedang melihat data dari ekskul {{ $ekskul->name }}</h2>

    <div>
        <h4>LIst Student</h4>
        <ol>
            @foreach ($ekskul->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
