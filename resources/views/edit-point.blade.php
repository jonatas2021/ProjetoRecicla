<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('point.edit', $points->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="latitude" placeholder="latitude" value="{{$points->latitude}}" id="" required>
        <input type="text" name="longitude" placeholder="longitude" value="{{$points->longitude}}" id="" required>
        <input type="submit" value="editar">
    </form>
</body>
</html>