<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        return view('student.list', [
            'students' => Student::all(),
        ]);
    }

    // Show create student form
    public function create()
    {
        return view('student.create');
    }

    // Save new student
    public function store(Request $request)
    {
        $student = Student::create(
            $request->validate($this->rules())
        );

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} created successfully!");
    }

    // Show student details
    public function show(Student $student)
    {
        return view('student.detail', [
            'student' => $student,
        ]);
    }

    // Show edit student form
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
        ]);
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $student->update(
            $request->validate($this->rules($student))
        );

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }

    // Shared validation rules
    private function rules(?Student $student = null): array
    {
        return [
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students')->ignore($student?->id),
            ],

            'course' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'address' => 'required|string|max:255',

            'date_of_birth' => 'required|date',
        ];
    }
}
