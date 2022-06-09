<!DOCTYPE html>2
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./../css/main.css" rel="stylesheet" />
</head>
<body>



<div class="container mt-5">
    <div>
        <h2>Filters</h2>
        <form action="/customers" method="get">
            <label for="is_blocked">Is blocked?</label>
            <input type="checkbox" name="is_blocked" id="is_blocked"/>
            <br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email"/>
            <br>
            <label for="phone_number">Number</label>
            <input type="text" name="phone_number" id = "phone_number"/>
            <br>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"/>
            <br>
            <button type="submit" class="btn btn-primary">Apply filters</button>
        </form>
    </div>

    <hr>

    <table class="table table-bordered mb-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Is blocked</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Registration</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->surname }}</td>
                <td>{{ $customer->is_blocked == true ? "Blocked": "Active" }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    {{ $customers->links() }}
</div>

</body>
</html>
