<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>房間詳情</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $room->name }}</h1>
        <img src="{{ $room->image }}" class="img-fluid" alt="{{ $room->name }}">
        <p>含早餐價格: TWD{{ $room->price_with_breakfast }}</p>
        <p>不含早餐價格: TWD{{ $room->price_without_breakfast }}</p>
        <p>含早餐原價: TWD{{ $room->original_price_with_breakfast }}</p>
        <p>不含早餐原價: TWD{{ $room->original_price_without_breakfast }}</p>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">返回列表</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>