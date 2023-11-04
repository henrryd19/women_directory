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
    <h3 class="text-center">WOMEN MANAGEMENT</h3>
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('women.create') }}" class="btn btn-success">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Biography</th>
                        <th class="text-center" scope="col">Field_of_work</th>
                        <th class="text-center" scope="col">Image</th>
                        <th class="text-center" scope="col">Birth_Date</th>
                        <th class="text-center" scope="col">Details</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach ($women as $woman)
                    <tbody> 
                        <tr>
                            <th class="text-center" scope="row">{{ $woman->id }}</th>
                            <td >{{ $woman->name }}</td>
                            <td >{{ $woman->biography }}</td>
                            <td >{{ $woman->field_of_work }}</td>
                            <td class="text-center">
                            @if(file_exists(public_path('uploads/images/' . $woman->cover_image)))
                                <img style="width: 200px; height: 200px;" src="{{ asset('uploads/images/' . $woman->cover_image) }}"
                                    alt="woman cover_image">
                            @else
                            <img style="width: 200px; height: 200px;" src="{{ $woman->cover_image }}" alt="woman cover_image">
                            @endif
                            </td>
                            <td >{{ $woman->birth_date}}</td>

                            <td class="text-center">
                            <a href="{{ route('women.show', ['woman' => $woman]) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                            </td>
                            <td class="text-center">
                            <a href="{{ route('women.edit', ['woman' => $woman]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                             </a>
                            </td>
                            
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal-{{ $woman->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <div class="modal fade" id="deleteModal-{{ $woman->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete this woman has id: {{ $woman->id }}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('women.destroy', $woman->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <div class="paginator">
                {{ $women->links() }}
            </div>
        </div>

       
    </main>
@endsection