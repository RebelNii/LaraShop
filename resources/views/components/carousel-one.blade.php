<style>
    #cards {
        width: 230px;
        height: 354px;
        border: 1px solid #333;
        margin: 10px 0;
        box-shadow: 5px 5px 5px #333;
        border-radius: 10px;
    }

    .cards .cards{
      padding: 0 5px;
      height: 100%;
      background: beige !important;
    }

    #cards .cards > div{
      margin: 15px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    #cards .cards .card-img img {
        height: 100px;
        width: 100px;
        object-fit: cover;
        object-position: center;
        border-radius: 10px;
        padding: 5px;
    }

    #cards .cards .card-name h5{
      font-size: 26px;
      font-weight: 600;
    }

    #cards .cards .card-price{
      display: flex;
      justify-content: space-evenly;
    }

    #cards .cards .card-price .prev-price{
      color: red;
      font-size: 13px;
    }

    #cards .cards .card-price .cur-price{
      color: aqua;
      font-size: 20px;
      font-weight: 600;
    }

    #cards .cards .card-btns{
      display: flex;
      justify-content: space-evenly;
    }

    #cards .cards .card-btns .wish form button{
      transition: all 300ms ease;
      background: rgb(234, 228, 107);
      outline: none;
      padding: 4px;
      box-shadow: 4px 4px 4px rgb(234, 228, 107);
      border: none;
      border-radius: 6px;
    }

    #cards .cards .card-btns .wish form button:hover{
      background: rgb(135, 242, 158);
      box-shadow: 4px 4px 4px rgb(135, 242, 158);
    }
    
    #cards .cards .card-btns .cart form button{
      transition: all 300ms ease;
      background: rgb(135, 204, 242);
      outline: none;
      padding: 4px;
      box-shadow: 4px 4px 4px rgb(135, 204, 242);
      border: none;
      border-radius: 5px;
      width: 60px;
    }

    #cards .cards .card-btns .cart form button:hover{
      background: rgb(226, 172, 249);
      box-shadow: 4px 4px 4px rgb(226, 172, 249);
    }
    .owl-nav{
      display: flex;
      justify-content: space-evenly;
    }

    .owl-nav button{
      background: teal;
      box-shadow: 3px 3px 3px teal;
    }

    .owl-nav button span{
      padding: 30px;
    }
</style>

@props(['product'])

<div id="cards" class="grid-item">
    <a href="/show/{{$product->id}}">
        <div class="cards">
            <div class="card-img"><img src="{{ asset('storage/' .$product->product_image) }}" alt="product image" loading="lazy"></div>
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
