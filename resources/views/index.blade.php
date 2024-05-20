<!-- resources/views/uploaded-data.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded CSV Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Uploaded CSV Data</h2>
                <a class="btn btn-primary" aria-hidden="true" href="{{ route('upload') }}">Upload csv</a>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Customer Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Email</th>
                            <th>Subscription Date</th>
                            <th>Website</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($csvData as $data)
                            <tr>
                            <td>{{ $data->index }}</td>
                                <td>{{ $data->customer_id }}</td>
                                <td>{{ $data->first_name }}</td>
                                <td>{{ $data->last_name }}</td>
                                <td>{{ $data->company }}</td>
                                <td>{{ $data->city }}</td>
                                <td>{{ $data->country }}</td>
                                <td>{{ $data->phone_1 }}</td>
                                <td>{{ $data->phone_2 }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->subscription_date }}</td>
                                <td>{{ $data->website }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
