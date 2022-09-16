<style>
    #card {
        width: 230px;
        height: 354px;
        border: 1px solid #333;
        margin: 10px 0;
        box-shadow: 5px 5px 5px #333;
        border-radius: 10px;
    }

    #card .card{
      padding: 0 5px;
      height: 100%;
      background: rgb(242, 220, 135, .4);
    }

    #card .card > div{
      margin: 15px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    #card .card .card-img img {
        height: 100px;
        width: 100px;
        object-fit: cover;
        object-position: center;
        border-radius: 10px;
        padding: 5px;
    }

    #card .card .card-name h5{
      font-size: 26px;
      font-weight: 600;
    }

    #card .card .card-price{
      display: flex;
      justify-content: space-evenly;
    }

    #card .card .card-price .prev-price{
      color: red;
      font-size: 13px;
    }

    #card .card .card-price .cur-price{
      color: aqua;
      font-size: 20px;
      font-weight: 600;
    }

    #card .card .card-btns{
      display: flex;
      justify-content: space-evenly;
    }

    #card .card .card-btns .wish form button{
      transition: all 300ms ease;
      background: rgb(234, 228, 107);
      outline: none;
      padding: 4px;
      box-shadow: 4px 4px 4px rgb(234, 228, 107);
      border: none;
      border-radius: 6px;
    }

    #card .card .card-btns .wish form button:hover{
      background: rgb(135, 242, 158);
      box-shadow: 4px 4px 4px rgb(135, 242, 158);
    }
    
    #card .card .card-btns .cart form button{
      transition: all 300ms ease;
      background: rgb(135, 204, 242);
      outline: none;
      padding: 4px;
      box-shadow: 4px 4px 4px rgb(135, 204, 242);
      border: none;
      border-radius: 5px;
      width: 60px;
    }

    #card .card .card-btns .cart form button:hover{
      background: rgb(226, 172, 249);
      box-shadow: 4px 4px 4px rgb(226, 172, 249);
    }
</style>

@props(['product'])

<div id="card" class="grid-item">
    <a href="/show/{{$product->id}}">
        <div class="card">
            <div class="card-img"><img src="{{ asset('storage/' .$product->product_image) }}" alt=""></div>
            <div class="card-name"><h5>{{$product->product_name}}</h5></div>
            <div class="card-price">
              <div class="prev-price">
                <span class="text"><small><strike>${{$product->product_old}}</strike></small></span>
              </div>
              <div class="cur-price"><span>${{$product->product_price}}</span></div>
            </div>
            <div class="card-btns">
              <div class="wish">
                <form action="/wishlist/{{$product->id}}" method="post">
                  @csrf
                  <button>Wishlist</button>
                </form>
              </div>
              <div class="cart">
                <form action="/cart/{{$product->id}}" method="post">
                  @csrf
                  <button><span class="material-symbols-sharp">shopping_basket
                    </span>
                  </button>
                </form>
              </div>
            </div>
        </div>
    </a>
</div>
