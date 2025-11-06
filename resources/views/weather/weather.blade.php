


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
</head>
<body style="font-family:Arial;  text-align:center; margin-top:100px; background-color:pink;">
    

    <h1>🌦️  Weather Information App</h1>

    <form method="POST" action="{{ route('get.weather') }}">
        @csrf
        <input type="text" name="city" placeholder="Enter City Name" required>
        <button type="submit">Get Weather  </button>
    </form>


    @if(isset($data))
        <h3>City : {{$data['name']}}</h3>
         <p>Temperature: {{ $data['main']['temp'] }} °C</p>
        <p>Condition: {{ $data['weather'][0]['description'] }}</p>
    @elseif(isset($error))    
        <p style="color:red;" > {{ $error }} </p>
    @endif    
</body>
</html>