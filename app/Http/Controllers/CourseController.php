<?php

namespace App\Http\Controllers;

use App\Models\{Course, Subject, User, Grade};
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
            'courses' => $courses,
            'subjects' => Subject::select('id', 'title')->get(),
            'grades'   => Grade::select('id', 'value')->get(),
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
    public function edit(Course $course, $id)
    {
        $course = Course::with('grade', 'subject', 'teacher')->where('id', $id)->first();
        $subjects = Subject::all();
        $grades = Grade::all();
        $teachers = User::where('role', 'teacher')->get();
        // dd($course);

        return Inertia::render('Course/Edit', [
            'course' => $course,
            'subjects' => $subjects,
            'grades' => $grades,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/courses'), $name);
            $data['image'] = '/images/courses' . $name;
        }

        $course = Course::where('id', $id)->first();

        $course->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, $id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('admin.index');
    }

    public function restore($id)
    {
        $course = Course::withTrashed()->findOrFail($id);
        $course->restore();

        return redirect()->back();
    }
}
