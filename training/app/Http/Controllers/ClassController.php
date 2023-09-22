<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $class = Classes::get();
        return view('classroom', ['classList' => $class]);
    }

    public function show($id)
    {
        $class = Classes::with(['students','homeroomTeacher'])->findOrFail($id);
        return view('classroom-detail', ['class' => $class]);
    }
}
