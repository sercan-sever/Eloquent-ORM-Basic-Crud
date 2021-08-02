<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('course', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courseInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'courseTitle' => 'required',
            'courseContent' => 'required',
            'courseMust' => 'required'
        ]);

        $course = Course::create([
            'courseTitle' => $request->courseTitle,
            'courseContent' => $request->courseContent,
            'courseMust' => $request->courseMust
        ]);
        $course->save();

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $result = Course::firstWhere('id', $id);

        return view('courseUpdate', ['course' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'courseTitle' => 'required',
            'courseContent' => 'required',
            'courseMust' => 'required'
        ]);

        Course::where('id', $id)
            ->update([
                'courseTitle' => $request->courseTitle,
                'courseContent' => $request->courseContent,
                'courseMust' => $request->courseMust
            ]);

        return redirect()->back()->with('status', 'İşlemimiz Başarılı Bir Şekilde Gerçekleştirilmiştir...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        return redirect()->route('course.index');
    }
}
