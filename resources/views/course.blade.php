@extends('layouts.app')

@section('title', 'Course Page Form')

@section('content')

    <div class="container">

        <h1>Courses</h1>
        <hr>
        <div align="right">
            <a href="{{ route('course.crate') }}" class="btn btn-success">Course Edding</a>
        </div>

        <div class="clearfix"></div><br>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Must</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->courseTitle }}</td>
                                <td>{{ $course->courseContent }}</td>
                                <td>{{ $course->courseMust }}</td>
                                <div class="row">
                                    <th>
                                        <a href="{{ route('course.edit',  ['id' => $course->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('course.destroy', $course->id) }}" class="btn btn-danger">Delete</a>
                                    </th>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
