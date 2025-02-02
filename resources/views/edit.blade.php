<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-group {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('update',$data->id) }}" method="post" id="reg_form">
            @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" value="{{old('name',$data->name)}}" id="name" name="name" required>
                </div>
                <div class="form-group">
                        <label for="phno">Phone No:</label>
                        <input type="text" class="form-control" value="{{old('phno',$data->phno)}}" id="phno" name="phno" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="radio" id="gender" value="male" name="gender"@if ($data->gender=="male")
                         checked="checked"
                        @endif>

                        <label for="address">Male</label>
                        <input type="radio" id="gender_fe" value="female" name="gender" required
                         @if ($data->gender=="female")
                         checked="checked"
                        @endif>
                        <label for="gender">Female</label>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{old('address',$data->address)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>
                    <div class="form-group">
   
    <img src="{{ asset('photo/' . $data->photo) }}" width="25%">
</div>
                          <div class="form-group">
                    <label for="dob">Password:</label>
                    <input type="password" class="form-control" value="{{old('password',$data->password)}}" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
