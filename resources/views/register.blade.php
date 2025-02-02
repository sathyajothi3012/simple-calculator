<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                @if (session('error'))
                    <div class="alert alert-danger">
                        <ul>
                           
                                <li>{{ session('error') }}</li>
                          
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="aalert alert-success">
                        <ul>
                          
                                <li>{{session('success') }}</li>
                          
                        </ul>
                    </div>
                @endif
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

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h3>    Register page</h3>
                <form action="{{ route('insert') }}" method="post" id="reg_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">username:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="phno">Phone No:</label>
                        <input type="text" class="form-control" id="phno" name="phno" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="radio" id="gender" value="male" name="gender">

                        <label for="address">Male</label>
                        <input type="radio" id="gender_fe" value="female" name="gender" required>
                        <label for="gender">Female</label>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                          <div class="form-group">
                    <label for="dob">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>