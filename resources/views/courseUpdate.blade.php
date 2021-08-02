@extends('layouts.app')

@section('title', 'Course Page Form')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 mx-auto">
                    <h1>Course Update Page</h1>
                    <hr>
                    <div align="right">
                        <a href="{{ route('course.index') }}" class="btn btn-success">Go Back</a>
                    </div>
                    <hr>

                    @if (session()->has('status'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong> {{ session('status') }} </strong>
                    </div>
                    @endif

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger text-center" role="alert">
                                    <strong> {{ $error }} </strong>
                                </div>
                            @endforeach
                        </ul>
                    @endif

                    @if (isset($course->id))
                    <form action="{{ route('course.update', $course->id) }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputTitle">Title</label>
                                <input type="text" value="{{ $course->courseTitle }}" class="form-control" id="inputTitle" name="courseTitle" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="textareaContent">Content</label>
                                <textarea class="form-control" id="textareaContent" name="courseContent" rows="4" placeholder="Content...">{{  $course->courseContent }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputMust">Must</label>
                                <input type="number" class="form-control" value="{{ $course->courseMust }}" name="courseMust" id="inputMust" placeholder="Must...">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Course Update</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
