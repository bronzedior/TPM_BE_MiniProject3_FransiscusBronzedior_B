<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Consultant</title>
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

    <div class="p-5">
        <h1 class="text-center">Update Consultant</h1>
        <form action="{{route('updateConsultant', $consultant->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input value="{{$consultant->name}}" type="text" class="form-control form-color" id="" name="name">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input value="{{$consultant->email}}" type="email" class="form-control form-color" id="" name="email">
            </div>

            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Position</label>
                <select class="form-select form-color" aria-label="Default select example" name="employment_position">
                    <option value="" disabled selected>select a position</option>
                    @foreach ($employments as $employment)
                        <option value="{{$employment->id}}" {{ $consultant->employment_id == $employment->id ? 'selected' : '' }}>{{$employment->position}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Industry and Expertise</label>
                <select class="form-select form-color" aria-label="Default select example" name="skill_industry">
                    <option value="" disabled selected>select an industry and expertise</option>
                    @foreach ($skills as $skill)
                        <option value="{{$skill->id}}" {{ $consultant->skill_id == $skill->id ? 'selected' : '' }}>{{$skill->industry}} --> {{$skill->expertise}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Reimbursement (stated in ribu rupiah)</label>
                <input value="{{$consultant->reimbursement}}" type="number" class="form-control form-color" id="" name="reimbursement">
            </div>

            @error('reimbursement')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Availability</label>
                <input value="{{$consultant->availability}}"type="date" class="form-control form-color" id="" name="availability">
            </div>

            @error('availability')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Project</label>
                <select class="form-select form-color" aria-label="Default select example" name="client_needs">
                    <option value="" disabled selected>select a project</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}" {{ $consultant->client_id == $client->id ? 'selected' : '' }}>{{$client->needs}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Current Image</label><br>
                <img src="{{ asset('storage/images/' . $consultant->image) }}" alt="Profile Picture" width="150">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Profile Picture</label>
                <input type="file" class="form-control form-color" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;" />
                </div>
            </div>

            @error('image')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
