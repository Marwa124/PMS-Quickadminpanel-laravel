<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR Letter</title>
</head>
<body>
    <h1 style="text-align:center;">مفردات المرتب</h1>
    <p style="text-align:right;">السادة............./</p>
    <p style="text-align:right;">تحية طيبة وبعد ،،،،،،،،</p>
    <br>
    <p style="text-align:right;"><span style="font-weight:bold;">ONE TEC GROUP</span>  تشهد شركة / ون تك جروب</p>
    <p style="text-align:right;">رقم السجل التجاري : 135842</p>
    <p style="text-align:right;">رقم البطاقة الضريبية : 759-190-562</p>
    <p style="text-align:right;">بإن الأستاذ / {{$details->name}}</p>
    <p style="text-align:right;">يعمل لدينا بالشركة فى وظيفة {{$details->job_circular()->first()->designation()->first()->designation_name}} من الفترة ..............</p>
    <p style="text-align:right;">وان صافى المرتب الشهري الخاص به هو.............ألف جنيه مصري فقط لاغير ) وقد قدمت هذه الشهادة بناء على طلبه دون ادنى مسئولية على الشركة.</p>
    <br/>
    <p style="text-align:center;"><span font-weight:bold;> {{date('d-m-Y')}} </span>  تحرير في</p>
    <p style="text-align:center;">وتفضلوا بقبول وافر الاحترام،،،،</p>
    <p style="text-align:left;">إدارة الموارد البشرية </p>
    <p style="text-align:left;">.......................</p>
    <p></p>
</body>
</html>
