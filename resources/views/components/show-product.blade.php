
<style>
    #showBladeOne{
        margin-top: 1.4rem;
    }

    #showBladeOne .showBladeOne{}

    #showBladeOne .showBladeOne{
        display: grid;
        grid-template-columns: repeat(2,1fr)
    }

    #showBladeOne .showBladeOne .showOne{
        display: block;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #showBladeOne .showBladeOne .showOne img{
        height: 500px;
        width: 420px;
        object-fit: cover;
        object-position: center;
    }

    #showBladeOne .showBladeOne .showTwo{
        padding: 20px;
    }

    #showBladeOne .showBladeOne .showTwo #showTwo .showDes h4{
        display: flex;
        justify-content: center;
        font-weight: 600;
        text-decoration: underline;
    }

    #showBladeOne .showBladeOne .showTwo #showTwo .showDes .textControl{
        font-weight: 400;
        font-size: 15px;
    }

    #showBladeOne .showBladeOne .showTwo #showTwo .showForm .showFormButton button{
        width: 100%;
        padding: 10px;
        outline: none;
        border: none;
        border-radius: 9px;
        background: rgb(10, 219, 56);
        box-shadow: 4px 4px 4px rgb(10, 219, 56); 
        text-transform: uppercase;
        transition: all 300ms ease;
    }

    #showBladeOne .showBladeOne .showTwo #showTwo .showForm .showFormButton button:hover{
        background: rgb(84, 234, 116);
        box-shadow: none;
    }

    @media(max-width: 768px){
        #showBladeOne .showBladeOne{
            grid-template-columns: 1fr;
        }

        #showBladeOne .showBladeOne .showTwo #showTwo .showForm .showFormButton{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #showBladeOne .showBladeOne .showTwo #showTwo .showForm .showFormButton button{
            width: 50%;
        }
    }
</style>

@props(['product'])

<div id="showBladeOne">
    <div class="showBladeOne">
        <div class="showOne">
            <img src="{{asset('storage/' .$product->product_image)}}" alt="{{$product->product_description}}">
        </div>
        <div class="showTwo">
            <div id="showTwo">
                <div class="showDes">
                    <h4>{{$product->product_name}}</h4>
                    <span class="textControl">Price: ${{$product->product_price}}</span> <br>
                    <span class="textControl">20,000 || reviews</span> <br>
                    <span class="textControl">Expected Delivery: <small>Within three days</small> </span><br>
                    <span class="textControl">Brand: {{$product->brand}}</span><br>
                    <span class="textControl">Category: {{$product->category}}</span><br>
                    <p>{{$product->product_description}}</p>
                </div>
                <hr>
                <div class="showForm">
                    <form action="/cart/{{$product->id}}" method="post">
                        @csrf
                        <div class="showFormColor">
                            <span>Select Color&nbsp;:</span> <br>
                            <select name="color" id="color">
                                <option value="red">Red</option>
                                <option value="blue">Blue</option>
                                <option value="black">Black</option>
                            </select>
                        </div>
                        <div class="showFormSize">
                            <span>Select Size&nbsp;:</span> <br>
                            <select name="size" id="size">
                                <option value="50GB">50GB</option>
                                <option value="100GB">100GB</option>
                                <option value="256GB">256GB</option>
                                <option value="512GB">512GB</option>
                            </select>
                        </div>
                        <hr>
                        <div class="showFormButton">
                            <button>Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>