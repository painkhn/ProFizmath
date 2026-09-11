<?php

namespace App\Http\Controllers;

use App\Models\{Grade, Subject, User};
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $teachers = User::where('role', 'teacher')->get();

        return Inertia::render('Admin/Index', [
            'subjects' => $subjects,
            'grades' => $grades,
            'teachers' => $teachers,
        ]);
    }
}
