<?php 

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class MainController extends Controller 
{
    public function index() 
    {
        return view('index', ['students' => Student::allStudent()]);
    }

    public function show($id) 
    {
        $student = Student::findOrFail($id);
        return view('show', ['student' => $student]);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'matricule' => 'required|unique:students,matricule|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'cours1' => 'nullable|string|max:255',
            'cours2' => 'nullable|string|max:255',
            'cours3' => 'nullable|string|max:255',
            'cours4' => 'nullable|string|max:255',
        ]);

        $student = Student::create($validatedData);
        return redirect()->route('index'); // Redirige vers l'index après création
    }

    public function update(Request $request, $id) 
    {
        $student = Student::findOrFail($id);
        
        $validatedData = $request->validate([
            'matricule' => 'required|unique:students,matricule,' . $student->id . '|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'cours1' => 'nullable|string|max:255',
            'cours2' => 'nullable|string|max:255',
            'cours3' => 'nullable|string|max:255',
            'cours4' => 'nullable|string|max:255',
        ]);

        $student->update($validatedData);
        return redirect()->route('index');
    }

    public function destroy($id) 
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('index');
    }
}
