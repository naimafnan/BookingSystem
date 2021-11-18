Dear {{$notificationCancelBookingbyDoctor['user_name']}},
<p>Sorry to inform that the doctor have cancelled your appointment.</p>
Doctor's name :{{ $notificationCancelBookingbyDoctor['doctor_name'] }}<br>
Time :{{$notificationCancelBookingbyDoctor['time']}}<br>
Date :{{$notificationCancelBookingbyDoctor['date']}}<br>
Location : {{ $notificationCancelBookingbyDoctor['doctor_add1'] }},{{ $notificationCancelBookingbyDoctor['doctor_add2'] }},{{ $notificationCancelBookingbyDoctor['doctor_add3'] }},{{ $notificationCancelBookingbyDoctor['doctor_add4'] }},{{ $notificationCancelBookingbyDoctor['doctor_postcode'] }},{{ $notificationCancelBookingbyDoctor['doctor_state'] }}<br>
Clinic's Name :{{ $notificationCancelBookingbyDoctor['cli_name'] }}
