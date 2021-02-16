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
            <a class="navbar-brand" href="#">Microservices</a>
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
    <div id="main" class="container-fluid"style="margin-top: 50px">
        <h3 class="page-header">Edit Customer ID {{$customer->id}}</h3>

        <!-- Área do Form-->
        <form method="post" action="{{route('customer.update', $customer->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}
            <!-- area de campos do form -->
            <!-- 3 campos por linha -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter the Name" value="{{$customer->name}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter the email" value="{{$customer->email}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter the phone" value="{{$customer->phone}}">
                </div>
            </div>
            <!-- 4 campos por linha -->
            <div class="row">
                    <div class="form-group col-md-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter the address" value="{{$customer->address}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter the city" value="{{$customer->city}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" placeholder="Enter the state" value="{{$customer->state}}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="bairro">Zipcode</label>
                        <input type="text" class="form-control" name="zipcode" placeholder="Enter the zipcode" value="{{$customer->zipcode}}">
                    </div>
                </div>
            <hr />
            <div id="actions" class="row">
                <!-- Div col-md-12 ocupa toda largura no grid -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{URL::asset('/customer')}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <!-- scripts js -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
