<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>Leave Type: <span>{{$details['leave_type']}}</span></h4>
    <h4>Leave start date: <span>{{$details['leave_start_date']}}</span></h4>
    @if ($details['leave_end_date'] != null)
        <h4>Leave end date: <span>{{$details['leave_end_date']}}</span></h4>
    @endif
    @if ($details['hours'] != null)
        <h4>Leave hours: <span>{{$details['hours']}}</span></h4>
    @endif
    @if ($details['reason'] != null)
        <h4>Reason: <span>{{$details['reason']}}</span></h4>
    @endif
    <a href="{{route('hr.admin.leave-applications.edit', $details['id'])}}" target="_blank" rel="noopener noreferrer">Approve Request</a>
</body>
</html>
