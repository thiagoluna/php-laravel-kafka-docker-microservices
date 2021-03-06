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
                <li><a href="{{URL::asset('/saml2/RENTAL/logout')}}">Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Container Principal -->
    <div id="main" class="container-fluid" style="margin-top: 50px">
        <h3 class="page-header">Add New Product</h3>

        <!-- Área do Form-->
        <form method="post" action="{{route('product.store')}}">
            {{ csrf_field() }}
            <!-- area de campos do form -->
            <!-- 3 campos por linha -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter the Name" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="senha">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter the Price" value="">
                </div>
            </div>
            <hr />
            <div id="actions" class="row">
                <!-- Div col-md-12 ocupa toda largura no grid -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{URL::asset('/product')}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <!-- scripts -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
