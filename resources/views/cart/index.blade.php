@extends('layout')

@section('content')

        <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset( $item->image_url) }}" class="img-fluid me-5" style="width: 85px; height: 90; border-radius: 10px" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item -> name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item -> price }}</p>
                                </td>
                                <form action="{{ route('cart.update', $item) }}" id="updateFromCart-{{ $item->id }}"  method="POST">
                                    @csrf
                                    @method('put')
                                <td>

                                        <div class="input-group quantity mt-3" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0" name="quantity" value="{{ session()->get('cart', [])[$item->id]->quantity ?? 1 }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item -> final_price }} $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-3" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
{{--                                    <form action="{{ route('cart.update', $item) }}" id="updateFromCart-{{ $item->id }}"  method="POST">--}}

{{--                                        <div class="input-group quantity mb-5" style="width: 100px;">--}}
{{--                                            <div class="input-group-btn">--}}
{{--                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">--}}
{{--                                                    <i class="fa fa-minus"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <input type="text" class="form-control form-control-sm text-center border-0" name="quantity" value="{{ session()->get('cart', [])[$item->id]->quantity ?? 1 }}">--}}
{{--                                            <div class="input-group-btn">--}}
{{--                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">--}}
{{--                                                    <i class="fa fa-plus"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <button class="btn btn-md rounded-circle bg-light border mt-3" >
                                            <i class="fa fa-check text-primary" onclick="document.getElementById('updateFromCart-{{ $item->id }}').submit()"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
{{--            <div class="mt-5">--}}
{{--                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">--}}
{{--                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>--}}
{{--            </div>--}}
            <div class="row g-4 justify-content-center">
                <div class="col-12"></div>
                <div class="col-sm-8 col-md-6 col-lg-6 col-xl-8">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 style="font-family: Poppins" class="display-6 mb-4">Cart <span class="display-6">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">{{ $sum }} $</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Free Shipping</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">{{$sum}} $</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

@endsection
