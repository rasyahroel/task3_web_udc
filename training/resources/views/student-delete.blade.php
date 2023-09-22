@extends('layouts.mainlayout')

@section('title', "Students | Update {{ $student->name }}")

@section('content')
    <div class="mt-5">
        <h2>Are you sure to delete data : {{ $student->name }} ({{ $student->nis }})</h2>

        <form action="/student-destroy/{{$student->id}}" method="POST" style="display: inline-block">

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>
@endsection
