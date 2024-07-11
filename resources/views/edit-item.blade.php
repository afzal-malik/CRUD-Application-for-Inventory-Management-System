 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container p-3 my-5 border">
        <h4>Edit Item</h4>
        <form action="/edit-item/{{$item->id}}" method="POST">
            @csrf
            @method('PUT')
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="name" class="form-label">Name</label></td>
                        <td><input type="text" class="form-control" id="name" name="name" value="{{$item->name}}"></td>
                    </tr>
                    <tr>
                        <td><label for="description" class="form-label">Description</label></td>
                        <td><textarea class="form-control" id="description" name="description">{{$item->description}}</textarea></td>
                    </tr>
                    <tr>
                        <td><label for="category" class="form-label">Category</label></td>
                        <td><input type="text" class="form-control" id="category" name="category" value="{{$item->category}}"></td>
                    </tr>
                    <tr>
                        <td><label for="quantity" class="form-label">Quantity</label></td>
                        <td><input type="number" class="form-control" id="quantity" name="quantity" value="{{$item->quantity}}"></td>
                    </tr>
                    <tr>
                        <td><label for="price" class="form-label">Price</label></td>
                        <td><input type="number" class="form-control" id="price" name="price" value="{{$item->price}}"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Save Changes</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Back</button>
        </form>
    </div>

    <div class="container p-3 my-5">
        <h4>Inventory Item</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="/delete-item/{{$item->id}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>