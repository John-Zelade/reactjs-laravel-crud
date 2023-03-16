<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/create.css">
  </head>
    <title>Document</title>
</head>
<body>
    <div class="container form-con">
        <div class="heading">
            <h1>Update Employee</h1>
        </div>
        <form action="/edit" method="POST">
            @csrf  <!-- @csrf is a token to submit form -->
            <input type="hidden" name="id" value="{{$emp_data->id}}">
            <div class="mb-3">
                <label for="name" class="form-label">Employee name</label>
                <input type="name" name="input_name" class="form-control" value="{{$emp_data->name}}">
             </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="input_email" class="form-control" value="{{$emp_data->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>


