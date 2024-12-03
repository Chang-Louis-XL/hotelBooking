
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="row">
                    @foreach($rooms as $room)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $room->image }}" class="card-img" alt="{{ $room->name }}" style="width: 150px; height: 150px;">
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $room->name }}</h5>
                                        <p class="card-text">TWD{{ $room->price_without_breakfast }}/晚起</p>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $room->id }}" aria-expanded="false" aria-controls="collapse{{ $room->id }}">
                                            顯示專案價格
                                        </button>
                                        <div class="collapse" id="collapse{{ $room->id }}">
                                            <div class="card card-body">
                                                <form action="/add-to-cart" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $room->id }}">
                                                    <input type="hidden" name="price" value="{{ $room->price_with_breakfast }}">
                                                    <input type="hidden" name="original_price" value="{{ $room->original_price_with_breakfast }}">
                                                    <p>含早餐專案價格: TWD{{ $room->price_with_breakfast }} (原價{{ $room->original_price_with_breakfast }})</p>
                                                    <button type="submit" class="btn btn-success">加入購物車</button>
                                                </form>
                                                <form action="/add-to-cart" method="POST" class="mt-2">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $room->id }}">
                                                    <input type="hidden" name="price" value="{{ $room->price_without_breakfast }}">
                                                    <input type="hidden" name="original_price" value="{{ $room->original_price_without_breakfast }}">
                                                    <p>不含早餐專案價格: TWD{{ $room->price_without_breakfast }} (原價{{ $room->original_price_without_breakfast }})</p>
                                                    <button type="submit" class="btn btn-success">加入購物車</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-1"></div>



            <div class="col-md-4">
                <h4>購物車</h4>
                <ul class="list-group">
                    @foreach(Cart::getContent() as $item)
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="mx-auto">
                                <h5>{{ $item->name }}</h5>
                                <p>價格: TWD{{ $item->price }}</p>
                                <p>原價: TWD{{ $item->attributes->original_price }}</p>
                                <p>數量: {{  $item->quantity }}</p>
                            </div>
                            <div class="mx-auto">
                                <form action="/remove-from-cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                                </form>
                            </div>
                            <div class="mx-auto">
                                <form action="/update-cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">更變</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-4 mb-4 mx-auto">
                    <p>原價總計: TWD{{ Cart::getTotal() }}</p>
                    <p>優惠金額: TWD{{ Cart::getTotal() - Cart::getSubTotal() }}</p>
                    <p>總價: TWD{{ Cart::getSubTotal() }}</p>
                    <form action="/checkout" method="POST">
                        @csrf
                        <button type="submit " class="btn btn-success">預定送出</button>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>