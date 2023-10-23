@extends('layouts.base')

@section('title')
    Woman
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
            <form action="{{ route('women.store') }}" method="post">
                @csrf
                <h3 class="text-center">ADD Women</h3>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Biography</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="biography">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Field_Of_Work</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="field_of_work">
                </div>
                <div class="input-group mb-3">
                    <label for="cover_image" class="input-group-text">Cover_image</label>
                     <input type="text" aria-describedby="basic-addon1" name="cover_image" id="cover_image" class="form-control" placeholder="Enter cover_image">
                @if($errors->has('cover_image'))
                <span class="text-danger">
                    {{ $errors->first('cover_image') }}
                </span>
                @endif
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Birth_Date</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="birth_date">
                </div>
                  
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Add" class="btn btn-success"></input>
                    <a href="{{route('women.index')}}" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </main>
@endsection