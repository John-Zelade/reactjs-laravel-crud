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
            <h1>Add Employee</h1>
            <a href="/list_employee">
            <button class="list-btn">
                <span>View Employee List</span>
                <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="37" cy="37" r="35.5" stroke="black" stroke-width="3"></circle>
                <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                </svg>
            </button>
            </a>
        </div>
        <form action="{{route('create')}}" method="POST">
            @csrf  <!-- @csrf is a token to submit form -->
            <div class="mb-3">
                <label for="name" class="form-label">Employee name</label>
                <input type="name" name="input_name" class="form-control" id="name">
                <span style="color:red">@error ('input_name'){{$message}} @enderror</span>
             </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="input_email" class="form-control" id="email">
                <span style="color:red">@error ('input_email'){{$message}} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>


