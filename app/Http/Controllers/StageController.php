<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Stage;
use App\Models\Student;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the internships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::with('student')->paginate(20);
        return view('stages.index', compact('stages'));
    }

    /**
     * Show the form for creating a new internship.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('stages.create', compact('students'));
    }

    /**
     * Store a newly created internship in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $stage = Stage::create($validatedData);

        return redirect()->route('stages.index')->with('success', 'Stage créé avec succès.');
    }

    /**
     * Show the form for editing the specified internship.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        $students = Student::all();
        return view('Stages.edit', compact('stage', 'students'));
    }

    /**
     * Update the specified internship in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'company_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'grade' => 'nullable|numeric|between:0,100.00',
            'notes' => 'nullable|string',
        ]);

        $stage = Stage::findOrFail($id);
        $stage->update($validatedData);

        return redirect()->route('stages.index')->with('success', 'Stage mis à jour avec succès.');
    }

    /**
     * Remove the specified internship from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stage = Stage::findOrFail($id);
        $stage->delete();

        return redirect()->route('stages.index')->with('success', 'Stage supprimé avec succès.');
    }
}
