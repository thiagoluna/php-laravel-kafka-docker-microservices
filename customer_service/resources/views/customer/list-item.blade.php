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
            <a class="navbar-brand" href="#">Microservice Customer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::asset('/product')}}">Products</a></li>
                <li><a href="{{URL::asset('/customer')}}">Customers</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="{{URL::asset('/saml2/CUSTOMER/logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container Principal -->
<div id="main" class="container-fluid" style="margin-top: 50px">
    <h3 class="page-header">View Customer {{$customer->name}}</h3>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Name</strong></p>
            <p>{{$customer->name}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Email</strong></p>
            <p>{{$customer->email}}</p>
        </div>
        <div class="col-md-4">
            <p><strong>Phone</strong></p>
            <p>{{$customer->phone}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Address</strong></p>
            <p>{{$customer->address}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>City</strong></p>
            <p>{{$customer->city}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>State</strong></p>
            <p>{{$customer->state}}</p>
        </div>
        <div class="col-md-3">
            <p><strong>Zipcode</strong></p>
            <p>{{$customer->zipcode}}</p>
        </div>
    </div>
    <hr />
    <!-- Botões -->
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary">Edit</a>
            <form style="display: inline-block;" method="POST" action="{{route('customer.destroy', $customer->id)}}"
                  data-toggle="tooltip" data-placement="top" title="Delete" onsubmit="return confirm('Confirm?')">
                {{method_field('DELETE')}}{{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <!-- link ativar o modal e exibir a div#delete-modal
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a> -->
            <a href="{{URL::asset('/customer')}}" class="btn btn-default">Close</a>
        </div>
    </div>
</div>

<!-- scripts -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
