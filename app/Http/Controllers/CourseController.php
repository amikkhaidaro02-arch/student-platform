<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Показать список всех курсов.
     */
    public function index()
    {
        $courses = Course::with('teacher')->latest()->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Показать форму создания нового курса.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Сохранить новый курс в базу данных.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code|max:50',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        Course::create([
            'title' => $request->title,
            'code' => $request->code,
            'description' => $request->description,
            'image_path' => $request->image_path,
            'teacher_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Курс успешно создан!');
    }
}