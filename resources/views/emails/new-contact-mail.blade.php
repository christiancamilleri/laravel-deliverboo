<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nuovo ordine</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <tr>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
        </tr>
    </table>

    <p>{{ $lead->content }}</p>
</body>

</html>
