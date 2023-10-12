@extends("layouts.main")

@section("content")
@include("layouts.partials.navbar")
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col">
                <h1>Notes App</h1>
                <a href="/notes/create" class="btn btn-success mb-5">Create Note</a>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
            {{session('success')}}
            </div>
            @endif
                
            <div class="row mt-3">
            <!-- @php $data = json_decode($notes) @endphp -->
                 @foreach ($notes as $note)
                 <div class="col-sm-6">
                    <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$note->title}}</h5>
                        <p class="card-text">{{$note->description}}</p>
                        
                        <a href="/notes/edit/{{$note->id}}" class="btn btn-warning">Update</a>
                        <form method="POST" action="/notes/delete/{{$note->id}}" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick=" return confirm('Are u sure want to delete this note ')">Delete</button>
                        </form>
                       

                    </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>

@endsection