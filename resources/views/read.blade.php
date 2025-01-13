<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <h1>Students' Records</h1>
    @if($done = Session::get('success'))
    <div class="alert alert-success">
        {{$done}}
    </div>
    @endif

    @if($done = Session::get('yes'))
    <div class="alert alert-danger">
        {{$done}}
    </div>
    @endif

    @if($done = Session::get('sure'))
    <div class="alert alert-warning">
        {{$done}}
    </div>
    @endif

<div class="container">
    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Actions</th>

        </tr>
        @foreach($records as $rec)
        <tr>
            <td>{{$rec->id}}</td>
            <td>{{$rec->name}}</td>
            <td>{{$rec->email}}</td>
            <td>
                <img src="product_images/{{$rec->image}}" alt="" width="50px">
            </td>
            <td>
                <a href="{{route('delete_route', ['id'=>$rec->id])}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                <a href="{{route('edit_route', ['id'=>$rec->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>     
            </td>
        </tr>
        @endforeach
</table>
<a href="/form">Enter A New Record</a>
</div>
   
</body>
</html>