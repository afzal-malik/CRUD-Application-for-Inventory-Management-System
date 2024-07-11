<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>

    @auth
    <div class="alert alert-success alert-dismissible fade show m-3">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Hooray!</strong> You have Successfully logged in.
    </div>
    <form action="/logout" method="POST">
     @csrf
     <button class="btn btn-danger ms-3">Log out</button>
  </form>
    
    <div class="container p-3 my-5 border">
    <h4>Create a New Item</h4>
    <form action="/create-item" method="POST">
     @csrf
     <div class="mb-3 mt-3 p-3 bg-light text-dark">
     <label for="name">Name:</label>
     <input class="form-control mb-3" type="text" name="name" placeholder="name">

     <label for="description">Description:</label>
     <textarea class="form-control mb-3" name="description" placeholder="description"></textarea>

     <label for="category">Category:</label>
     <input class="form-control mb-3" type="text" name="category" placeholder="category">

     <label for="quantity">Quantity:</label>
     <input class="form-control mb-3" type="number" name="quantity" placeholder="quantity">

     <label for="price">Price:</label>
     <input class="form-control mb-3" type="number" name="price" placeholder="price">
     </div>
     <button class="btn btn-success">Save Item</button>
    </form>
    </div>

    <div class="container mt-3">
     <h4>All Items</h4>
     <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name of the Item and the User</th>
          <th>Description</th>
          <th>Edit Item</th>
          <th>Delete Item</th>
        </tr>
      </thead>
      <tbody>
        <tr>
     @foreach ( $items as $item )
     <td>{{$item['name']}} by {{$item->user->name}}</td>
     <td>{{$item['description']}}</td>
     <td><a class="btn btn-warning" href="/edit-item/{{$item->id}}">Edit</a></td>
     <form action="/delete-item/{{$item->id}}" method="POST">
     @csrf
     @method('DELETE')
     <td><button class="btn btn-danger">Delete</button></td>
     </form>
     </tr>
     </tbody>
     @endforeach        
      </table>
    </div>
    

    @else
    <div class="container p-3 my-5 border">
    <h4>Register</h4>
        <form action="/register" method="POST" class="was-validated">
          @csrf
         <div class="mb-3 mt-3 p-3 bg-light text-dark">
         <label for="name">Name:</label>
         <input class="form-control" name="name" type="text" placeholder="name" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>


         <label for="email">Email:</label>
         <input class="form-control" name="email" type="text" placeholder="email" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>


         <label for="password">Password:</label>
         <input class="form-control" name="password" type="password" placeholder="password" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
         </div>
         <button class="btn btn-primary">Register</button>
       </form>
    </div>
    

        <div class="container p-3 my-5 border">
        <h4>Login</h4>
        <form action="/login" method="POST" class="was-validated">
          @csrf
         <div class="mb-3 mt-3 p-3 bg-light text-dark">
         <label for="loginname">Name:</label>
         <input class="form-control" name="loginname" type="text" placeholder="name" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>

         <label for="loginpassword">Password:</label>
         <input class="form-control" name="loginpassword" type="password" placeholder="password" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>

         </div>
         <button class="btn btn-primary">Log in</button>
        </form>
      </div>
    @endauth
</body>
</html>