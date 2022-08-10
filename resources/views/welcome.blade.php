<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>app</title>
    <script src="{{asset('js/app.js')}}"></script>
{{--    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>--}}
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher("7c0662889a8b9950e621", {
            cluster: "eu",
        });

        // var channel = pusher.subscribe("trakerCar");


        channel.bind("carTraker", (data) => {
            console.log(JSON.stringify(data));
        });

        // channel.bind("carTraker", (data) => {
        //     console.log(JSON.stringify(data));
        //     alert(JSON.stringify(data));
        // });
    </script><!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

        #map {
            height: 100%;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <!-- Scripts and CSS import -->

</head>
<body class="antialiased">
<button >Update Postion 1</button>

<div id="map"></div>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-pUJlOqQmGLXHLmhyR7FzghVt99w4q4Q&callback=initMap&v=weekly"
    defer
></script>

<script>
    let map;
    let marker;

    function initMap() {
        const uluru = { lat: -25.344, lng: 131.031 };
        // The map, centered at Uluru
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: uluru,
        });
        // The marker, positioned at Uluru
        marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }

    function updatePosition1($lat,$lng)
    {
        const latLog = { lat: $lat, lng: $lng };
        marker.setPosition(latLog);
        map.setCenter(latLog);
    }



    Echo.channel(`trakerCar`)
        .listen('carTraker', (e) => {
            //console.log(e);
            updatePosition1( -23.344,  131.031);
        });

    window.initMap = initMap;
</script>
</body>
</html>
