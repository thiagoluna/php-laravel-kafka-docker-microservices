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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
        <!-- Topo do container com 3 colunas -->
        <div id="top" class="row">
            <div class="col-md-3">
                <h2>Products Stored - {{$total}}</h2>
            </div>
            <!-- Form Busca -->
            <div class="col-md-6">
                <form action="{{ url('/busca') }}" method="post">
                    <div class="input-group h2">
                            {{ csrf_field() }}
                            <input name="criterio" class="form-control" id="criterio" type="text" placeholder="Search Products" value="">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                </form>
            </div>
            <!-- Botão Novo -->
            <div class="col-md-3">
                <!-- <a href="//URL::asset('add-product/')}}" class="btn btn-primary pull-right h2">Add Nem Product</a> -->
            </div>
        </div> <!-- /#top -->
        <hr />
        <!-- Listagem dos itens do bd -->
        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close"
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('message') }}
        </div>
        @endif
        <div id="list" class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Total</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Listar dados do bd -->
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->qtd_available}}</td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="{{route('product.show', $product->id)}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- /#listagem -->

        <!-- Paginação -->
        @if(isset($criterio))
            {{ $products->appends(['criterio' => $criterio])->links() }}
        @else
            {!! $products->links() !!}
        @endif
    </div>  <!-- /#main -->

    <!-- scripts -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
