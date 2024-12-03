<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增房間</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>新增房間</h1>
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">房間名稱</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">圖片 URL</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="price_with_breakfast">含早餐價格</label>
                <input type="number" class="form-control" id="price_with_breakfast" name="price_with_breakfast" required>
            </div>
            <div class="form-group">
                <label for="price_without_breakfast">不含早餐價格</label>
                <input type="number" class="form-control" id="price_without_breakfast" name="price_without_breakfast" required>
            </div>
            <div class="form-group">
                <label for="original_price_with_breakfast">含早餐原價</label>
                <input type="number" class="form-control" id="original_price_with_breakfast" name="original_price_with_breakfast" required>
            </div>
            <div class="form-group">
                <label for="original_price_without_breakfast">不含早餐原價</label>
                <input type="number" class="form-control" id="original_price_without_breakfast" name="original_price_without_breakfast" required>
            </div>
            <button type="submit" class="btn btn-primary">新增房間</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>