Dear {{$notificationCancelBooking['doctor_name']}},
<p>Sorry to inform that the patient have cancelled your appointment.</p>
Patient's name :{{ $notificationCancelBooking['name'] }}<br>
Time :{{$notificationCancelBooking['time']}}<br>
Date :{{$notificationCancelBooking['date']}}<br>
Location : {{ $notificationCancelBooking['doctor_add1'] }},{{ $notificationCancelBooking['doctor_add2'] }},{{ $notificationCancelBooking['doctor_add3'] }},{{ $notificationCancelBooking['doctor_add4'] }},{{ $notificationCancelBooking['doctor_postcode'] }},{{ $notificationCancelBooking['doctor_state'] }}<br>
Clinic's Name :{{ $notificationCancelBooking['cli_name'] }}