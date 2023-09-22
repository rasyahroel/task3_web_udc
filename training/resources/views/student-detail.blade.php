@extends('layouts.mainlayout')

@section('title', "$student->name")

@section('content')
    <h2>Anda sedang melihat data dari student {{ $student->name }}</h2>

    <div class="my-3 d-flex justify-content-center">
        {{--  @if ($student->image != '')  --}}
            <img src="{{ asset('storage/photo/' . $student->image) }}" alt="">
            {{--  @else
            <img src="{{ asset('public/images/...') }}" alt="">
        @endif  --}}
    </div>

    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Homeroom Teacher</th>
        </tr>
        <tr>
            <td>{{ $student->nis }}</td>
            <td>
                @if ($student->gender == 'P')
                    Perempuan
                @else
                    Laki Laki
                @endif
            </td>
            <td>{{ $student->class->name }}</td>
            <td>{{ $student->class->homeroomTeacher->name }}</td>
        </tr>
    </table>

    <div>
        <h3>Extracurriculars</h3>
        <ol>
            @foreach ($student->Extracurriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
