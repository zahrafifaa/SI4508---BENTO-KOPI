<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Branch</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            text-align: left;
        }
        .result h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .result p {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Branch</h1>
        <form action="{{ route('branches.search') }}" method="GET">
            <input type="text" name="query" placeholder="Enter location name">
            <input type="submit" value="Search">
        </form>
        @if(isset($branches) && count($branches) > 0)
            <div class="result">
                <h2>Search Results:</h2>
                <ul>
                    @foreach($branches as $branch)
                        <li>
                            <h3>{{ $branch->name }}</h3>
                            <p><strong>Address:</strong> {{ $branch->address }}</p>
                            <p><strong>Operational Hours:</strong> {{ $branch->operational_hours }}</p>
                            <p><strong>Phone Number:</strong> {{ $branch->phone_number }}</p>
                            <p><strong>Fasilitas:</strong> {{ $branch->facilities }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @elseif(isset($query))
            <div class="result">
                <p>No branches found for "{{ $query }}"</p>
            </div>
        @endif
    </div>
</body>
</html>
