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

    <form action="{{ Route('updateData', $customers->id )}}" method="post">
        @csrf
        @method("PUT")
        <label class="form-label">Enter Your Name<br>
            <input name="name" value="{{$customers->name}}" class="form-control">
        </label>
        <label>Enter Your Number<br>
            <input name="phone" value="{{$customers->phone}}" class="form-control">
        </label>
        <label>Enter Your Address<br>
            <input name="address" value="{{$customers->address}}" class="form-control">
        </label>
        <label>Enter Your CNIC<br>
            <input name="cnic" value="{{$customers->cnic}}" class="form-control">
        </label>
        <button>Save</button>
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