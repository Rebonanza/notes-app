@extends("layouts.main")

@section("content")
@include("layouts.partials.navbar")
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col">
                <h1>Notes App</h1>
                <a href="/notes/create" class="btn btn-success">Create Note</a>
            </div>
                
            <div class="row mt-3">
            @php $data = json_decode($notes) @endphp
                 @foreach ($data as $note)
                 <div class="col-sm-6">
                    <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$note->title}}</h5>
                        <p class="card-text">{{$note->description}}</p>
                        
                        <a href="#" class="btn btn-warning">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>

                    </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>

@endsection