<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['corporate']->title}}</title>
</head>
<body>

Dear {{$data['corporate']->title}},
<br><br>

One new application received for internship : {{$data['internship']->title}}.
<br><br>


<u>Applicant Details</u><br>
Name : {{$data['resume']->firstname}}, {{$data['resume']->lastname}} <br>
Contact : {{$data['resume']->mobile}} <br>



<br><br>
Team Interndiniya <br>
email: info@internduniya.com
    
</body>
</html>