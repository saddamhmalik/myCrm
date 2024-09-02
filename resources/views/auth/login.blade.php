<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class=" d-flex align-items-center bg-primary-subtle justify-content-center vh-100">
    <form class="w-100 card shadow-lg p-4" style="max-width: 500px; border-radius: 10px"
          action="{{route('login.submit')}}" method="POST">
        @csrf
        <div class="card-header bg-white mb-3 text-center">
            <h4>{{__('login.welcome')}}</h4>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('login.email_address')}}</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{@old('email')}}" required>
            <div id="emailHelp" class="form-text">{{__('login.never_share_your_email')}}</div>
            @error('email')
            <div class="alert alert-danger form-text" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">{{__('login.password')}}</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            @error('password')
            <div class="alert alert-danger form-text" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{__('login.login')}}</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
