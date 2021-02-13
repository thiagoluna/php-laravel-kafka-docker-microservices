<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD com Bootstrap + Laravel</title>
    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Microservice Rental</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::asset('/product')}}">Products</a></li>
                <li><a href="{{URL::asset('/customer')}}">Customers</a></li>
                <li><a href="{{URL::asset('/order')}}">Orders</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Container Principal -->
    <div id="main" class="container-fluid"style="margin-top: 50px">
        <h3 class="page-header">Edit Order ID {{$order->id}}</h3>

        <!-- Área do Form-->
        <form method="post" action="{{route('order.update', $order->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}
            <!-- area de campos do form -->
                <!-- 3 campos por linha -->
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="customer_id">Customer</label>
                        <select name="customer_id" class="form-control" required>
                            <option value="">Choose a Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer['id'] }}" {{ old('status', $customer['id']) == $order->customer_id ? ' selected' : '' }}>{{ $customer['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Choose an option</option>
                            <option value="Reserved" {{ old('status', "Reserved") == $order->status ? ' selected' : '' }}>Reserved</option>
                            <option value="Awaiting Delivery" {{ old('status', "Awaiting Delivery") == $order->status ? ' selected' : '' }}>Awaiting Remove</option>
                            <option value="Delivered" {{ old('status', "Delivered") == $order->status ? ' selected' : '' }}>Delivered</option>
                            <option value="Done" {{ old('status', "Done") == $order->status ? ' selected' : '' }}>>Done</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="downpayment">Downpayment</label>
                        <input type="text" class="form-control" name="downpayment" placeholder="Enter the downpayment" value="{{$order->downpayment}}">
                    </div>
                </div>
                <!-- 4 campos por linha -->
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="delivery_fee">Delivery Fee</label>
                        <input type="text" class="form-control" name="delivery_fee" placeholder="Enter the delivery_fee" value="{{$order->delivery_fee}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="late_fee">Late Fee</label>
                        <input type="text" class="form-control" name="late_fee" placeholder="Enter the late_fee" value="{{$order->late_fee}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="discount">Discount</label>
                        <input type="text" class="form-control" name="discount" placeholder="Enter the discount" value="{{$order->discount}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="order_date">Reservation Date</label>
                        <input type="text" class="form-control" name="order_date" placeholder="Enter the order_date" value="{{$order->order_date}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="return_date">Return Date</label>
                        <input type="text" class="form-control" name="return_date" placeholder="Enter the return_date" value="{{$order->return_date}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" name="total" placeholder="Enter the total" value="{{$order->total}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="balance">Balance</label> <!-- saldo devedor -->
                        <input type="text" class="form-control" name="balance" placeholder="Enter the balance" value="{{$order->balance}}">
                    </div>
                </div>
                <hr />
                <div id="actions" class="row">
                    <!-- Div col-md-12 ocupa toda largura no grid -->
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{URL::asset('/order')}}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
        </form>
    </div>

    <!-- scripts js -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
