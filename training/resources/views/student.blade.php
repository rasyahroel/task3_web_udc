@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')
    <h1>Ini adalah Students</h1>

    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="GET">
            <div class="input-group flex-nowrap">
                <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                <button class="input-group-text btn btn-primary" id="addon-wrapping">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($studentList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->class->name }}</td>

                    @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                        -
                    @else
                        <td><a href="student/{{ $data->id }}">Detail</a></td>
                        <td><a href="student-edit/{{ $data->id }}">Edit</a></td>
                    @endif

                    @if (Auth::user()->role_id == 1)
                        <td><a href="student-delete/{{ $data->id }}">Delete</a></td>
                    @endif

                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="my-5">
        {{ $studentList->withQueryString()->links() }}
    </div>
@endsection
