@extends('layouts.base')

@section('title')
    woman
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('women.index') }}">Woman</a>
    </li>
    
@endsection

@section('main')
    <main class="container vh-100 mt-5">
        <div>

            <form action="{{ route('women.update', ['woman' => $woman]) }}" method="POST">
                @csrf
                @method('PUT')
                            
                <h3 class="text-center">EDIT WOMEN</h3>
                <div class="mt-4">
                    <div class="text-center">
                        <img class="rounded" src="{{ $woman->cover_image }}" alt="" height="200px">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Id Woman</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="id"
                            value="{{ $woman->id }}" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="name"
                            value="{{ $woman->name}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Biography</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="biography"
                            value="{{ $woman->biography}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Field_Of_Work</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="field_of_work"
                            value="{{ $woman->field_of_work}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Cover_image</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="cover_image"
                            value="{{ $woman->cover_image}}">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Birth_date</span>
                        <input type="date" class="form-control" aria-describedby="basic-addon1" name="birth_date"
                            value="{{ $woman->birth_date}}">
                    </div>
                    
                    <div class="d-flex gap-2 justify-content-end ">
                        <button type="submit" name="btnEdit" class="btn btn-success">Save</button>
                        <a href="{{route('women.index')}}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection