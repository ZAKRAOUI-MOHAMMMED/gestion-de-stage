<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::paginate(20);
        return view('students.index')->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        //     $student =new Student;
        // $student ->name = $request->name;
        // $student ->address = $request->address;
        // $student->mobile = $request->mobile;
        // $student->save();
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'Étudiant ajouté!');
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        // $student ->name = $request->name;
        // $student ->address = $request->address;
        // $student->mobile = $request->mobile;
        // $student->save();

        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'étudiant mis à jour!');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Étudiant supprimé!');
    }
}
