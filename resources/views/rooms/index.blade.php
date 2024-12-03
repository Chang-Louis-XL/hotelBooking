<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>房間列表</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>房間列表</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">新增房間</a>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $room->image }}" class="card-img-top" alt="{{ $room->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">含早餐價格: TWD{{ $room->price_with_breakfast }}</p>
                            <p class="card-text">不含早餐價格: TWD{{ $room->price_without_breakfast }}</p>
                            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">查看</a>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">編輯</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">刪除</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>