<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::with([
            'grade',
            'subject',
            'teacher'
        ])
        ->where('id', $id)
        ->first();

        return Inertia::render('Course/Index', [
            'course' => $course
        ]);
    }

    public function list()
    {
        $courses = Course::with([
            'subject',
            'grade'
        ])->get();
        // dd($courses);
        return Inertia::render('Course/List', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'subject_id' => $request->subject_id,
            'grade_id' => $request->grade_id,
            'teacher_id' => $request->teacher_id,
            'language' => $request->language,
            'duration' => $request->duration,
            'course_format' => $request->course_format,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
