<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>profilePicture</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->name}}</td>
            <td>{{$contact->title}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{$contact->address}}</td>
            <td><img src="data:image/png;base64,{{ $contact->profilePicture }}" alt="profilePicture"></td>
        </tr>
        @endforeach
    </table>
</body>

</html>