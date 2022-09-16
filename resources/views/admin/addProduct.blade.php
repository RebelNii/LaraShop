@extends('admin')

@section('admin')

<style>
    #adminAdd{}

    #adminAdd .adminAdd{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
        height: 100%;
    }

    #adminAdd .adminAdd form{
        background: rgb(239, 168, 129);
        width: 330px;
        padding: 10px;
        border: 1px solid saddlebrown;
        border-radius: 4px;
    }

    #adminAdd .adminAdd form > div{
        margin: 13px 0;
        padding: 0 5px;
    }

    #adminAdd .adminAdd form .form1 .adP1 input{
        width: 100%;
        outline: none;
        border: none;
        padding: 8px;
        border-radius: 6px;
        box-shadow: 3px 3px 3px #f3f3f3
    }

    #adminAdd .adminAdd form  h5{
        text-transform: uppercase;
        text-decoration: underline;
        font-size: 16px;
        font-weight: 600;
        text-shadow: 1px 1px 1px #333;
        padding: 4px;
        justify-content: center;
        display: flex;
    }

    #adminAdd .adminAdd form .form1 button{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 2.2rem;
        outline: none;
        border: none;
        border-radius: 4px;
        transition: all 300ms ease;
    }
</style>

<div id="adminAdd">
    <div class="adminAdd">
        <form action="/admin/addproduct" method="post" enctype="multipart/form-data">
            @csrf
            <h5>Add Product</h5>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Name</label> <br>
                    <input type="text" name="product_name" id="product_name" placeholder="Product Name">
                </div>
                <div class="adP2">
                    @error('product_name')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Image</label> <br>
                    <input type="file" name="product_image" id="product_image" placeholder="Product Image">
                </div>
                <div class="adminPreview" id="preview">
                    <img src="" alt="" id="imagePreview" class="imagePreview">
                </div>
                <div class="adP2">
                    @error('product_image')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Price</label> <br>
                    <input type="text" name="product_price" id="product_price" placeholder="Product Price">
                </div>
                <div class="adP2">
                    @error('product_price')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Retail Price</label> <br>
                    <input type="text" name="product_old" id="product_old" placeholder="Retail Price">
                </div>
                <div class="adP2">
                    @error('product_old')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Description</label> <br>
                    <textarea name="product_description" id="editor" cols="30" rows="20"></textarea>
                </div>
                <div class="adP2">
                    @error('product_description')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Category</label> <br>
                    <input type="text" name="category" id="category" placeholder="Product Category">
                </div>
                <div class="adP2">
                    @error('category')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="adP1">
                    <label for="">Product Brand</label> <br>
                    <input type="text" name="brand" id="brand" placeholder="Product Brand">
                </div>
                <div class="adP2">
                    @error('brand')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <button><span class="material-symbols-sharp">
                    add
                </span> Add</button>
            </div>
        </form>
    </div>
</div>


@endsection