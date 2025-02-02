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
            padding-bottom: 2%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row mt-4">
       
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
        <div class="form-group">
    <label for="name">Photo: </label>
    <img src="{{ asset('photo/' . $data->photo) }}" width="25%">
</div>

                <div class="form-group">
                    <label for="name">username: {{$data->name}}</label>
                    
                </div>
                <div class="form-group">
                    <label for="email">Phone No: {{$data->phno}}</label>
                </div>
                <div class="form-group">
                    <label for="dob">Gender: {{$data->gender}}</label>
                </div>
                <div class="form-group">
                    <label for="phno">Address: {{$data->address}}</label>
                </div>
                <div class="form-group">
                <label for="phno">Password: {{$data->password}}</label>      
                      </div>
                      <div class="form-group">
                <label for="phno">Created At: {{$data->created_at}}</label>      
                      </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
