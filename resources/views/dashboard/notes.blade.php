@extends("layouts.main")

@section("content")
@include("layouts.partials.navbar")
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col">
                <h1>Notes around the world</h1>
            </div>
                
            <div class="row mt-3">
                 @foreach ($notes as $note)
                 <div class="col-sm-6">
                    <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$note->title}}</h5>
                        <p class="card-text">{{$note->description}}</p>
                        <small>Created by {{$note->user->name}}</small>               
                    </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>

@endsection