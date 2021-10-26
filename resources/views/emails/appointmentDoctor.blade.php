Dear {{$notificationDoctor['doctor_name']}},
<p>Congrats, You have an appointment</p>
<p>The details of your appointment are below:</p>
Patient's name :{{ $notificationDoctor['name'] }}<br>
Time :{{$notificationDoctor['time']}}<br>
Date :{{$notificationDoctor['date']}}<br>
Location : {{ $notificationDoctor['doctor_add1'] }},{{ $notificationDoctor['doctor_add2'] }},{{ $notificationDoctor['doctor_add3'] }},{{ $notificationDoctor['doctor_add4'] }},{{ $notificationDoctor['doctor_postcode'] }},{{ $notificationDoctor['doctor_state'] }}<br>
Clinic's Name :{{ $notificationDoctor['cli_name'] }}