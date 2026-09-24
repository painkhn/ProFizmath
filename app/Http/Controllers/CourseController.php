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

        $teacherCourses = Course::where('teacher_id', $course->teacher_id)->get();

        return Inertia::render('Course/Index', [
            'course' => $course,
            'teacherCourses' => $teacherCourses,
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
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/courses'), $name);
            $data['image'] = '/images/courses/' . $name;
        }

        Course::create($data);
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
