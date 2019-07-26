<!DOCTYPE html>
<html>
<head>
 <title>Reservation Confirmation</title>
</head>
<body>

 <h1>A reservation has been made by {{ $name }}</h1>

 <h2> Place: {{ $place_name  }} </h2>
 <h2> Table: #{{ $table_code }} </h2>
 <h2> Date: {{ $date }} </h2>
 <h2> Time: {{ $time }} </h2>
 <p>If you were not the one who made it, you can come anyway</p>

</body>
</html>