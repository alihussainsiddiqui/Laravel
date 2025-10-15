<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        @if (session()->has("success"))
        <div class="alert alert-success">{{session()->get("success")}}</div>
        @endif
        <table class="table table-primary table-striped">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>CNIC</th>
                <th>Action</th>
            </tr>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->cnic}}</td>
                <td>
                
                <a href="{{Route('restore', $customer->id)}}"><button class="btn btn-primary">Restore</button></a>
              
                <form method="post" action="{{Route('pdelete', $customer->id)}}">
                    @csrf 
                    @method("DELETE")
                    <button class="btn btn-success">Permenant Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="{{Route('ListView')}}">Go back to Customer List</a>
    </section>
</body>
</html>