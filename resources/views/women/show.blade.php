
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
        <form action="{{route('women.show', ['woman' => $woman])}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">INFOR WOMEN</h3>
            
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Biography</th>
                        <th class="text-center" scope="col">Field_of_work</th>
                        <th class="text-center" scope="col">Cover_image</th>
                        <th class="text-center" scope="col">Birth_Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">{{$woman->id}}</td>
                        <td class="text-center" >{{$woman->name}}</td>
                        <td class="text-center" >{{$woman->biography}}</td>
                        <td class="text-center" >{{$woman->field_of_work}}</td>
                        <td class="text-center">
                        @if(file_exists(public_path('uploads/images/' . $woman->cover_image)))
                            <img style="width: 200px; height: 200px;" src="{{ asset('uploads/images/' . $woman->cover_image) }}"
                                alt="woman cover_image">
                        @else
                        <img style="width: 200px; height: 200px;" src="{{ $woman->cover_image }}" alt="woman cover_image">
                        @endif
                         </td>
                         <td class="text-center" >{{$woman->birth_date}}</td>
                    </tr>
                    
                    </tbody>
                </table>
                <div class="d-flex gap-2 justify-content-end ">
                        
                    <a href="{{route('women.index')}}" class="btn btn-warning">Back</a>
                </div>
            </div>
            
        </form>
    </div>
</main>   
@endsection 