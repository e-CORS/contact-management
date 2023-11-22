<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit Contact</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email">
        </div>
        <div>
            <label>Phone</label>
            <input type="tel" name="phone" placeholder="099 999 999">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" placeholder="Calle Hola y Adios">
        </div>
        <div>
            <label>Profile picture</label>
            <input type="file" name="profilePicture">
        </div>
        <div>
            <input type="submit" value="save changes">
        </div>
    </form>
</body>

</html>