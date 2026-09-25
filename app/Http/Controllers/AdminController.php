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
        $courses = Course::query()
        ->with(['subject', 'grade', 'teacher'])
        ->when($request->filled('search'), function ($q) use ($request) {
            // экранируем спецсимволы LIKE, чтобы % и _ не ломали запрос
            $search = addcslashes($request->input('search'), '%_\\');
            $q->where('title', 'like', '%' . $search . '%');
        })
        ->orderByDesc('id')
        ->get();

        return Inertia::render('Admin/Index', [
            'subjects' => $subjects,
            'grades' => $grades,
            'teachers' => $teachers,
            'courses' => $courses,
            'filters'  => $request->only('search'),
        ]);
    }
}
