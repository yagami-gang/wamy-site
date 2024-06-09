<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('wamy.css')}}">
    <title>Document</title>
</head>
<body>
<header>
    <div class="principale">
        <div class="logo">
            <a href="#"><img src="{{asset('img/rd.jpg')}}" height="70px" width="100px"></a>
            <span>RDR</span>    
        </div>
        <nav class="onglets">
            <ul>
                <li><a href="{{route('accueil')}}">ACCUEIL</a>
                <li><a href="{{route('a-propos')}}">A PROPOS</a>
                <li><a href="{{route('service')}}">SERVICE</a>
                <li><a href="{{route('login')}}">COMPTE</a>
            </ul>
        </nav>
    </div>
    </header>

</body>
</html>
   