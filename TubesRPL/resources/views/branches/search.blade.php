<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results for "{{ $query }}"</h1>
    <ul>
        @foreach($branches as $branch)
            <li><a href="{{ route('branches.show', $branch->id) }}">{{ $branch->name }}</a> - {{ $branch->address }}</li>
        @endforeach
    </ul>
</body>
</html>
