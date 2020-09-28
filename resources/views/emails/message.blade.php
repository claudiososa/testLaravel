<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje</title>
</head>
<body>
    <h1>Mensaje desde Agrosty.com</h1>
    <hr>
    <p>Nombre: {{$create_message->fromName}}</p>
    <p>Email: {{$create_message->fromEmail}}</p>
    {{-- <p>Asunto: {{$create_message->subject->desc}}</p> --}}
    <p>Mensaje</p>
    <p>{{$create_message->body}}</p>
    
</body>
</html>