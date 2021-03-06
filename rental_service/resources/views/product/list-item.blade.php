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
    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Delete Product</h4>
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
        <h3 class="page-header">Visualizar Atleta {{$product->name}}</h3>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Nome</strong></p>
                <p>{{$product->name}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Description</strong></p>
                <p>{{$product->description}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Price</strong></p>
                <p>{{$product->price}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Quantity Available</strong></p>
                <p>{{$product->qtd_available}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Quantity Total</strong></p>
                <p>{{$product->qtd_total}}</p>
            </div>
        </div>
        <hr />
        <!-- Botões -->
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="{{URL::asset('/product')}}" class="btn btn-default">Close</a>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
