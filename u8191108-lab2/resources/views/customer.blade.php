<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
<div class="container mt-5">
    <table class="table table-bordered mb-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Is blocked</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Registration at</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->is_blocked ? "YES" : "NO" }}</td>
            <td>{{ $customer->phone_number }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->created_at }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table table-bordered mb-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>City</th>
            <th>Street</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Apartment</th>
            <th>Intercom code</th>
            <th>Added at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer->addresses->sortByDesc('created_at') as $address)
            <tr>
                <td>{{ $address->id }}</td>
                <td>{{ $address->title }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->street}}</td>
                <td>{{ $address->building }}</td>
                <td>{{ $address->floor }}</td>
                <td>{{ $address->apartment }}</td>
                <td>{{ $address->intercom_code }}</td>
                <td>{{ $address->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
