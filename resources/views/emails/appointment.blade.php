Dear {{$notificationBooking['name']}},
<p>Thank you for booking your appointment with FOMEMA</p>
Doctor :{{ $notificationBooking['doctor_name'] }}<br>
Time :{{$notificationBooking['time']}}<br>
Date :{{$notificationBooking['date']}}<br>
Location : {{ $notificationBooking['doctor_add1'] }},{{ $notificationBooking['doctor_add2'] }},{{ $notificationBooking['doctor_add3'] }},{{ $notificationBooking['doctor_add4'] }},{{ $notificationBooking['doctor_postcode'] }},{{ $notificationBooking['doctor_state'] }}<br>
Clinic's Name :{{ $notificationBooking['cli_name'] }}

