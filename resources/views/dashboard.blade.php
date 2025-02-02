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
        @if (Session::has('success'))
    <div class="alert alert-success">
       
           
              {{ Session::get('success') }}
          
    </div>
@endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
            <a href="{{Route('logout')}}" class="btn btn-primary">logout</a>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div >
           <div class="card-bady" >
            <table class="table">
                <tr>
                    <th>Sno</th>
                    <th>username</th>

                    <th>Phone No</th>
                    <th>Gender</th>

<th>Address</th>
<th>Created at</th>
<th>Actions</th>

                </tr>
                @if($data->isNotEmpty())
                @foreach($data as $datas)
                <tr>
                    <td>{{$datas->id}}</td>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->phno}}</td>
                    <td>{{$datas->gender}}</td>
                    <td>{{$datas->address}}</td>
                    <td>{{$datas->created_at}}</td>
                    <td>
                    <a href="{{Route('view',$datas->id)}}" class="btn btn-primary">View</a>
                    <a href="{{Route('edit',$datas->id)}}" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger" onclick="deleteData({{$datas->id}});">Delete</a>


                    <form id="delete-{{$datas->id}}" action="{{ route('delete',$datas->id) }}" method="post">
    @csrf
    @method('delete')
</form>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
    </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<script>
    function deleteData(id){
        if(confirm("Are you sure to delete the data?")){
            document.getElementById("delete-"+id).submit();
        }
    }
</script>
