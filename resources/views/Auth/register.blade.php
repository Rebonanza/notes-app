@extends("layouts.main")

@section("content")
    <div class="container mt-5 text-center">
        <div class="row mt-5 ms-5">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card shadow p-3 mt-5 border-0"  style="width: 25rem;">
                    <div class="card-body">
                        <h2 class="card-title">Notes App</h2>
                        <span class="card-text">Please login to enter the app</span>
                        <form method="POST" class="mt-3" action="/register">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email')
                                is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('username')
                                is-invalid @enderror" id="floatingInput" placeholder="your name" name="name">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control @error('password')
                                is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                                <label for="floatingPassword">Password</label>
                            </div>
                            <span class="mt-3">Already have an account <a href="/" class="link-primary">Login</a></span>
                            <br>
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
            </div>
    </div>
@endsection