<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Consultant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{route('welcome')}}">Consultant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{route('welcome')}}" class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('addConsultant')}}" class="nav-link text-white" href="#">Insert</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <h1 class="text-center mt-3">Our Consultants</h1>

    <div class="m-5">
        <a href="{{route('addConsultant')}}" class="">
            <button class="btn btn-success">Insert</button>
        </a>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($consultants as $consultant)
            <div class="col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card" style="width: 100%;">
                    <img src="{{asset('/storage/images/'.$consultant->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{$consultant->name}}</h5>
                        <p class="card-text">Email: {{$consultant->email}}</p>
                        <p class="card-text">Position: {{$consultant->employment->position}}</p>
                        <p class="card-text">Industry: {{$consultant->skill->industry}}</p>
                        <p class="card-text">Expertise: {{$consultant->skill->expertise}}</p>
                        <p class="card-text">Availability: {{$consultant->availability}}</p>
                        <p class="card-text">Project: {{$consultant->client->needs}}</p>
                        <a href="{{route('editConsultant', $consultant->id)}}" class="btn btn-success">Edit</a>
                        <form action="{{route('deleteConsultant', $consultant->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
