<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>                        
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $message)
            <tr>
                <td>
                    <td>{{$message->id}}</td>
                    <td>{{$message->fromName}}</td>
                    <td>{{$message->fromEmail}}</td>
                </td>
            </tr>

            @empty
                <tr>                          
                    <td colspan="3">No hay datos para mostrar</td>                            
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>