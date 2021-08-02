@extends('layouts.app')

@section('title', 'Course Page Form')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 mx-auto">
                    <h1>Course Page</h1>
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

                    <form action="{{ route('course.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputTitle">Title</label>
                                <input type="text" value="{{ old('courseTitle') }}" class="form-control" id="inputTitle" name="courseTitle" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="textareaContent">Content</label>
                                <textarea class="form-control" id="textareaContent" name="courseContent" rows="4" placeholder="Content...">{{ old('courseContent') }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputMust">Must</label>
                                <input type="number" class="form-control" value="{{ old('courseMust') }}" name="courseMust" id="inputMust" placeholder="Must...">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Course Edding</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
