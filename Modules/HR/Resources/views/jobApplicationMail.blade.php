<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Designation: <span>{{$job_circular}}</span></h2>
    <h4>Name: <span>{{$details['name']}}</span></h4>
    <h4>Email: <span>{{$details['email']}}</span></h4>
    <h4>Mobile: <span>{{$details['mobile']}}</span></h4>
    @if ($details['description'] != null)
        <h4>Cover Later: <span>{{$details['description']}}</span></h4>
    @endif
</body>
</html>
