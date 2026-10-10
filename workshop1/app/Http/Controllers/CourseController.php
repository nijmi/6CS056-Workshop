<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();

        return view('course.list', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => [
                'required',
                Rule::in(['Easy', 'Medium', 'Hard']),
            ],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('course.detail', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => [
                'required',
                Rule::in(['Easy', 'Medium', 'Hard']),
            ],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
