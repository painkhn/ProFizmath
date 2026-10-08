<?php

namespace App\Http\Controllers;

use App\Models\{Course, Grade, Subject, User};
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $teachers = User::where('role', 'teacher')->get();
        $students = User::where('role', 'student')->get();
        $courses = Course::query()
        ->with(['subject', 'grade', 'teacher'])
        ->when($request->filled('search'), function ($q) use ($request) {
            // экранируем спецсимволы LIKE, чтобы % и _ не ломали запрос
            $search = addcslashes($request->input('search'), '%_\\');
            $q->where('title', 'like', '%' . $search . '%');
        })
        ->orderByDesc('id')
        ->get();

        $deletedCourses = Course::onlyTrashed()->get();

        return Inertia::render('Admin/Index', [
            'subjects' => $subjects,
            'grades' => $grades,
            'teachers' => $teachers,
            'students' => $students,
            'courses' => $courses,
            'deletedCourses' => $deletedCourses,
            'filters'  => $request->only('search'),
        ]);
    }

    public function addTeacher(User $user)
    {
        $user->role = 'teacher';
        $user->save();

        return redirect()->back();
    }

    public function makeStudent(User $user)
    {
        $user->role = 'student';
        $user->save();

        return redirect()->back();
    }
}
