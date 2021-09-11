<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
    <h3>{{$email['subject']}}</h3>
    <p>{{$email['body']}}</p>
    <p><a href="{{$email['link']}}">Click here</a></p>
    <br>
    <p>Or go to:</p>
    <p>{{$email['link']}}</p>
</body>
</html>