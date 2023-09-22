@extends('layouts.mainlayout')

@section('title', 'Students')

@section('content')
    <h1>Ini halaman Student yang telah di hapus</h1>

    <a href="/students" class="btn btn-primary">Back</a>

    <div class="mt-5">
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
                @foreach ($student as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->nis }}</td>
                        <td><a href="/student/{{ $item->id }}/restore">Restore</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
