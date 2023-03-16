<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/list.css">

<div class="container">
<div class="heading">
<h1>Employee List</h1>
<a href="/create">
<button class="cssbuttons-io-button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
    <path fill="none" d="M0 0h24v24H0z"></path>
    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Add</span>
</button>
</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Employee E-mail</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($list_data as $data)
    <tr>
        <th scope="row">{{$data->id}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>
          <a href="edit/{{$data->id}}" class="btn btn-success">Edit</a>
          <a href="delete/{{$data->id}}"  class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

