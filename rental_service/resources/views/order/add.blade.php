<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Microservices + Laravel</title>
    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Delete Customer</h4>
            </div>
            <div class="modal-body">
                Confirm?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>   <!-- /.modal -->

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
            <a class="navbar-brand" href="#">Microservice Order</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::asset('/product')}}">Products</a></li>
                <li><a href="{{URL::asset('/customer')}}">Customers</a></li>
                <li><a href="{{URL::asset('/order')}}">Orders</a></li>
                <li><a href="{{URL::asset('/saml2/RENTAL/logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container Principal -->
<div id="main" class="container-fluid" style="margin-top: 50px">
    <h3 class="page-header">Add New Order</h3>

    <!-- Área do Form-->
    <form method="post" action="{{route('order.store')}}">
    {{ csrf_field() }}
    <!-- area de campos do form -->
        <!-- 3 campos por linha -->
        <div class="row">
            <div class="form-group col-md-4">
                <label for="customer_id">Customer</label>
                <select name="customer_id" class="form-control" required>
                    <option value="">Choose a Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer['id'] }}" >{{ $customer['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="email">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="">Choose an option</option>
                    <option value="Reserved">Reserved</option>
                    <option value="Awaiting Delivery">Awaiting Remove</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Done">Done</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="senha">Downpayment</label>
                <input type="text" class="form-control" name="downpayment" placeholder="Enter the downpayment" value="">
            </div>
        </div>
        <!-- 4 campos por linha -->
        <div class="row">
            <div class="form-group col-md-3">
                <label for="delivery_fee">Delivery Fee</label>
                <input type="text" class="form-control" name="delivery_fee" placeholder="Enter the delivery_fee" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="late_fee">Late Fee</label>
                <input type="text" class="form-control" name="late_fee" placeholder="Enter the late_fee" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="discount">Discount</label>
                <input type="text" class="form-control" name="discount" placeholder="Enter the discount" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="order_date">Reservation Date</label>
                <input type="date" class="form-control" name="order_date" placeholder="Enter the order_date" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="return_date">Return Date</label>
                <input type="date" class="form-control" name="return_date" placeholder="Enter the return_date" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="total">Total</label>
                <input type="text" class="form-control" name="total" placeholder="Enter the total" value="">
            </div>

            <div class="form-group col-md-3">
                <label for="balance">Balance</label> <!-- saldo devedor -->
                <input type="text" class="form-control" name="balance" placeholder="Enter the balance" value="">
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

<!-- scripts -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
