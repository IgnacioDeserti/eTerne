@extends('layouts.muestraProductos')

@props(['cartCollection', 'mensaje'])

@section('content')
    @if (isset($mensaje))
        {{ $mensaje }}
    @endif

    <div class="container">
        <nav aria-label="">
            <ul class="nav-menu">
                <li><a href="/" class="nav-link">Tienda</a></li>
                <li class="nav-item" aria-current="page">Cart</li>
            </ul>
        </nav>

        @if (session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="botonesCart" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="botonesCart" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

        @if (count($errors) > 0)
            @foreach ($errors0 > all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="botonesCart" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif

        <div class="cart-content">
            <div class="cart-items">
                @if (\Cart::getTotalQuantity() > 0)
                    <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4>
                @else
                    <h4>Carrito sin productos</h4>
                    <a href="/" class="">Continue en la tienda</a>
                @endif

                @foreach ($cartCollection as $item)
                    <div class="cart-item">
                        <div class="containerImage">
                            <img src="{{ $item->attributes->image }}" class="" width="200" height="200">
                        </div>

                        <div class="cart-item-info">
                            <p>
                                <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b>
                                <br>
                                <b>Price: </b>${{ $item->price }}
                            </p>
                            <p>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }} --}}
                            </p>
                        </div>

                        <div class="cart-item-quantity">
                            <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">

                                <label class="labelCant" for="quantity">Cantidad:</label>
                                <input type="number" class="" value="{{ $item->quantity }}" id="quantity"
                                    name="quantity">
                                <button class="botonesCart"><i class="fa fa-edit"></i></button>

                            </form>

                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="botonesCart"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @if (count($cartCollection) > 0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="botonesCart">Borrar Carrito</button>
                    </form>
                @endif
            </div>

            @if (count($cartCollection) > 0)
                <div class="cart-total">
                    <ul>
                        <li><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        <li>
                            <a href="/" class="">Continue en la tienda</a>
                            <a href="{{route('cart.checkout')}}" class="">Proceder al Checkout</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
