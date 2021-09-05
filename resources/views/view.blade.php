<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($data as $val)
    <p>This is product id <b>{{ $val->id }}</b></p>
    <p>This is product name <b>{{ $val->name }}</b></p>
    <p>This is product count <b>{{ $val->count }}</b></p>
    <p>This is product price <b>{{ $val->price }}</b></p>
    <p>This is product description <b>{{ $val->description }}</b></p>


    @endforeach
</body>
</html>