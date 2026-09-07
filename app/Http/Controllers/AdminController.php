<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $grades = Grade::all();

        return Inertia::render('Admin/Index', [
            'subjects' => $subjects,
            'grades' => $grades,
        ]);
    }
}
