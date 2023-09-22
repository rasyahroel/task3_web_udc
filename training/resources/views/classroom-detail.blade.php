@extends('layouts.mainlayout')

@section('title', "$class->name")

@section('content')
    <h2>Anda sedang melihat data dari kelas {{ $class->name }}</h2>

    <div>
        <h4>Homeroom Teacher : {{ $class->homeroomTeacher->name }}</h4>
    </div>

    <div>
        <h4>LIst Student</h4>
        <ol>
            @foreach ($class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
