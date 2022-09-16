@extends('admin')


@section('admin')

<style>
    #filter{
        margin-top: 2rem;

    }

    #filter form input{
        outline: none;
        border: none;
        border-radius: 7px;
        width: 95%;
        margin-bottom: 7px;
        padding: 10px;
        color: #333;
        background: rgb(244, 211, 193);
    }

    #adminProducts .adminProducts{
    }

    #adminProducts .adminProducts{}

    #adminProducts .adminProducts table {
        border-spacing: 2px;
        border-collapse: collapse;
        border-radius: 7px;
        padding: 15px;
        width: 94%;
        cursor: pointer;
        background: rgb(215, 224, 221);
    }

    #adminProducts .adminProducts table thead tr th{
        padding: 10px;
        margin-bottom: 10px;
    }

    #adminProducts .adminProducts table tbody tr td{
        padding: 10px;
        border-bottom: 1px solid #333;
    }

    .adminImg{
        width: 50px;
        height: 50px;
    }

    @media(max-width: 768px){
        #adminProducts .adminProducts table thead tr th:first-child{
            display: none;
        }

        #adminProducts .adminProducts table tbody tr td:first-child{
            display: none;
        }

        #adminProducts .adminProducts table thead tr th:nth-child(4){
            display: none;
        }

        #adminProducts .adminProducts table tbody tr td:nth-child(4){
            display: none;
        }

        #adminProducts .adminProducts table thead tr th:nth-child(5){
            display: none;
        }

        #adminProducts .adminProducts table tbody tr td:nth-child(5){
            display: none;
        }
    }


</style>


<div id="filter">
    <form action="/admin/products">
        @csrf
        <input type="search" name="search" id="search" placeholder="Search">
    </form>
</div>
<div id="adminProducts">
    <div class="adminProducts">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Retail Price</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <a href="/admin/products/{{$product->id}}">
                            <td><img class="adminImg" src="{{asset('storage/'.$product->product_image)}}" alt=""></td>
                            <td><span>{{$product->product_name}}</span></td>
                            <td><span>${{$product->product_price}}</span></td>
                            <td><span>${{$product->product_old}}</span></td>
                            <td><span>{{$product->category}}</span></td>
                        </a>
                        <td> <abbr title="delete product"> <a href="/admin/delete/{{$product->id}}">
                                <span class="material-symbols-sharp">
                                    remove
                                </span>
                            </a> </abbr>
                            <abbr title="update product"> <a href="/admin/update/{{$product->id}}">
                                <span class="material-symbols-sharp">
                                    update
                                </span>
                            </a> </abbr>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection