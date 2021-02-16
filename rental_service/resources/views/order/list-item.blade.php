<!DOCTYPE html>
<html lang="pt-br">
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
            <a class="navbar-brand" href="#">Microservice Rental</a>
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
    <h3 class="page-header">View Order {{$order->id}}</h3>
    <div class="row">
        <div class="col-md-4">
            <p><strong>ID</strong></p>
            <p>{{$order->id}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Customer</strong></p>
            <p>{{$order->customer_id}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Status</strong></p>
            <p>{{$order->status}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Downpayment</strong></p>
            <p>{{$order->downpayment}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Delivery Fee</strong></p>
            <p>{{$order->delivery_fee}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Late Fee</strong></p>
            <p>{{$order->late_fee}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Discount</strong></p>
            <p>{{$order->discount}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Reservation Date</strong></p>
            <p>{{$order->order_date}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Return Date</strong></p>
            <p>{{$order->return_date}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Total</strong></p>
            <p>{{$order->total}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Balance</strong></p>
            <p>{{$order->balance}}</p>
        </div>
    </div>
    <hr />
    <!-- Botões -->
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary">Edit</a>
            <form style="display: inline-block;" method="POST" action="{{route('order.destroy', $order->id)}}"
                  data-toggle="tooltip" data-placement="top" title="Delete" onsubmit="return confirm('Confirm?')">
                {{method_field('DELETE')}}{{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <!-- link ativar o modal e exibir a div#delete-modal
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a> -->
            <a href="{{URL::asset('/order')}}" class="btn btn-default">Close</a>
        </div>
    </div>

    <!-- ITEMS -->
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <div id="top" class="row">
                <div class="col-md-3">
                    <h3 class="page-header">View Order Items</h3>
                </div>
                <div class="col-md-6">
                    &nbsp;
                </div>
                <div class="col-md-3">
                    <a href="{{route('add.order.item', $order->id)}}" class="btn btn-primary pull-right h2">Add Nem Item</a>
                </div>
            </div>
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>total</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->qtd}}</td>
                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="{{route('order.show', $item->id)}}" disabled="disabled">View</a>
                            <a class="btn btn-warning btn-xs" href="{{route('edit.order.item', $item->id)}}">Edit</a>
                            <form style="display: inline-block;" method="POST" action="{{route('order.destroy', $item->id)}}"
                                  data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirm delete?')">
                                {{method_field('DELETE')}}{{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" disabled="disabled">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /#listagem -->

    <!-- PAYMENTS -->
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <div id="top" class="row">
                <div class="col-md-3">
                    <h3 class="page-header">View Order Payments</h3>
                </div>
                <div class="col-md-6">
                    &nbsp;
                </div>
                <div class="col-md-3">
                    <a href="{{route('add.order.payment', $order->id)}}" class="btn btn-primary pull-right h2">Add Nem Payment</a>
                </div>
            </div>
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{$payment->id}}</td>
                        <td>{{$payment->payment_type}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->payment_date}}</td>
                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="#" disabled="disabled">View</a>
                            <a class="btn btn-warning btn-xs" href="#" disabled="disabled">Edit</a>
                            <form style="display: inline-block;" method="POST" action="{{route('order.destroy', $payment->id)}}"
                                  data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirm delete?')">
                                {{method_field('DELETE')}}{{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs" disabled="disabled">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /#listagem -->
    <br><br><br>
</div>

<!-- scripts -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
