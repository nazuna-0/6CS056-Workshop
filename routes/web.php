<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course; 

Route::get('/', function () {
    return view('welcome');
});

// --- Student Routes ---

Route::get('/students', function () {
    $students = Student::all();
    return view('student.list', ['students' => $students]);
})->name('students.index');

Route::get('/students/create', function () {
    return view('student.create');
})->name('students.create');

Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'phone'         => 'required|string|max:20',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
})->name('students.store');

Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', ['student' => $student]);
})->name('students.show');

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', ['student' => $student]);
})->name('students.edit');

Route::put('/students/{id}', function (Request $request, $id) {
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'phone'         => 'required|string|max:20',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::findOrFail($id);
    $student->update($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} updated successfully!");
})->name('students.update');

Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');
})->name('students.destroy');

// --- Course Routes ---

Route::get('/courses', function () {
    $courses = Course::all();
    return view('course.list', ['courses' => $courses]);
})->name('courses.index');

Route::get('/courses/create', function () {
    return view('course.create');
})->name('courses.create');

Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration'    => 'required|integer|min:1',
        'fee'         => 'required|numeric|min:0',
        'difficulty'  => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course = Course::create($validated);

    return redirect()->route('courses.index')
        ->with('success', "Course {$course->name} created successfully!");
})->name('courses.store');

Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.detail', ['course' => $course]);
})->name('courses.show');

Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.edit', ['course' => $course]);
})->name('courses.edit');

Route::put('/courses/{id}', function (Request $request, $id) {
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration'    => 'required|integer|min:1',
        'fee'         => 'required|numeric|min:0',
        'difficulty'  => 'required|in:Easy,Medium,Hard',
    ]);

    $validated['is_active'] = $request->boolean('is_active');

    $course = Course::findOrFail($id);
    $course->update($validated);

    return redirect()->route('courses.index')
        ->with('success', "Course {$course->name} updated successfully!");
})->name('courses.update');

Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('courses.index')
        ->with('success', 'Course deleted successfully!');
})->name('courses.destroy');