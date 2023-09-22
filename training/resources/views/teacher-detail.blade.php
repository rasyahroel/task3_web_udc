@extends('layouts.mainlayout')

@section('title', "$teacher->name")

@section('content')
    <h2>Anda sedang melihat data dari guru {{ $teacher->name }}</h2>

    <div>
        <h4>
            Class :
            @if ($teacher->class)
                {{ $teacher->class->name }}
            @else
                -
            @endif
        </h4>
    </div>

    <div>
        <h4>LIst Student</h4>
        @if ($teacher->class)
            <ol>
                @foreach ($teacher->class->students as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            </ol>
        @else
            -
        @endif
    </div>

@endsection
