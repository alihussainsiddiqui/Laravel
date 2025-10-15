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
    <h1>Add Customer</h1>

    <form action="{{ Route('submitCustomer' )}}" method="post">
        @csrf
        <label class="form-label">Enter Your Name
            <input name="name" class="form-control">
        </label><br>
        <label>Enter Your Number
            <input name="phone" class="form-control">
        </label><br>
        <label>Enter Your Address
            <input name="address" class="form-control">
        </label><br>
        <label>Enter Your CNIC
            <input name="cnic" class="form-control">
        </label><br><br>
        <button class="btn btn-primary">Save</button><br><br><a class="btn btn-success" href="{{Route('ListView')}}">Check List</a>
    </form>
    </section>
</body>
</html>

@if(session()->has("success"))
  {{session()->get("success")}}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif