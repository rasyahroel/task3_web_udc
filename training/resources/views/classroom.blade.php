@extends('layouts.mainlayout')

@section('title', 'Classroom')

@section('content')
    <h1>Ini adalah Classroom</h1>
    <h3>Classroom List</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td><a href="classroom-detail/{{ $data->id }}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
