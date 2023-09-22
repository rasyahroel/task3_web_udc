@extends('layouts.mainlayout')

@section('title', 'Teachers')

@section('content')
    <h1>Ini adalah Teachers</h1>

    <div>
        <a href="" class="btn btn-primary">Add Data</a>
    </div>

    <h3>Teachers List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td><a href="teacher-detail/{{ $data->id }}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
