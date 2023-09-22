<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Eloquent
        $keyword = $request->keyword;
        $student = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);
        return view('student', ['studentList' => $student]);

        // Student::create([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis'=>'0072412',
        //     'class_id' => 1
        // ]);

        // Student::find(20)->update([
        //     'name' => 'query builder',
        //     'class_id' => 3
        // ]);

        // Student::find(10)->delete();

        // Query Builder
        // $student = DB::table('students')->get();
        // DB::table('students')->insert([
        //     'name' => 'query builder',
        //     'gender' => 'L',
        //     'nis'=>'0072412',
        //     'class_id' => 1
        // ]);
        // DB::table('students')->where('id', 5)->update([
        //     'name'=> 'Student',
        //     'class_id' => 3
        // ]);
        // DB::table('students')->where('id', 5)->delete();
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = Classes::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request['image'] = $newName;
        $student = Student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add new student success');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = Classes::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->update($request->all());
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $deleteStudent = Student::findOrFail($id);
        $deleteStudent->delete();

        if ($deleteStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Delete student success');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deletedStudent = Student::onlyTrashed()->get();
        return view('student-deleted-list', ['student' => $deletedStudent]);
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        if ($deletedStudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'Restore student success');
        }

        return redirect('/students');
    }
}
