<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            أدخل احداثيات الموقع الجديد
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('points.store')}}">
                @csrf
                <div class="form-group">
                    <label for="Location">latitude</label>
                    <input type="text" id="lat" name="lat" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="Location">Longitude</label>
                    <input type="text" id="lng" name="lng" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
