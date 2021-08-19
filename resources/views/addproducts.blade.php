@extends('app')
@section('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
        </div>
        <div class="card shadow">
            <div class="card-body text-dark">
                <form action="/add-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="price" class="font-weight-bold">Product Price</label>
                                    <input type="text" class="form-control" name="price" id="price">
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="font-weight-bold">Product Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="footwear">Footwear</option>
                                        <option value="jewellery">Jewellery</option>
                                        <option value="books">Books</option>
                                        <option value="home_decor">Home Decor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="font-weight-bold">Product Description</label>
                                <textarea class="form-control" name="desc" id="desc"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Product Image</label>
                            <div class="custom-file mb-3">
								<input type="file" class="custom-file-input" name="product_img" id="product_img" accept="image/*" multiple>
								<label class="custom-file-label" for="product_img" id="file-name">Choose image...</label>
						    </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <output id="list"></output>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
@endSection