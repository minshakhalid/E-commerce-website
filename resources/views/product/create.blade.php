@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="range" name="rating" min="0" max="5" class="form-control" id="rating" placeholder="Enter Rating">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" name="weight" class="form-control" id="weight" placeholder="Enter Weight">
                    </div>
                    <div class="form-group">
                        <label for="minWeight">Min Weight</label>
                        <input type="text" name="minWeight" class="form-control" id="minWeight" placeholder="Enter Min Weight">
                    </div>
                    <div class="form-group">
                        <label for="country">Country of Origin</label>
                        <input type="text" name="country" class="form-control" id="country" placeholder="Enter Country">
                    </div>
                    <div class="form-group">
                        <label for="quality">Quality</label>
                        <input type="text" name="quality" class="form-control" id="quality" placeholder="Enter Quality">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
