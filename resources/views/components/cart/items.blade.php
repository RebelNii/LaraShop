<style>
    #cart-main .cart-main {
        width: 100%;
        display: flex;
        padding: 0 20px;
    }

    #cart-main .cart-main .cart-img img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        object-position: center;
        border-radius: 6px;
    }

    #cart-main .cart-main table {
        width: 100%;
        padding: 20px;
        transition: all 300ms ease;
        margin-bottom: 1rem;
        text-align: center;
        text-transform: uppercase;
        font-size: 15px;
        font-weight: 600;
        border: 2px solid gray;
        border-radius: 20px;
        background: rgb(242, 244, 171);
    }

    #cart-main .cart-main table:hover {
        box-shadow: 9px 9px 9px rgb(242, 244, 171);
    }

    #cart-main .cart-main table thead {
        border-bottom: 2px solid gray;
    }

    #cart-main .cart-main table tbody tr td {
        height: 6rem;
        width: 4rem
    }

    .cart-btn-down {
        outline: none;
        border: none;
        width: 50px;
        background: rgb(239, 131, 112);
        border-radius: 3px;
        box-shadow: 2px 2px 2px rgb(239, 131, 112);
    }

    .cart-btn-up {
        outline: none;
        border: none;
        width: 50px;
        background: rgb(119, 239, 112);
        border-radius: 3px;
        box-shadow: 2px 2px 2px rgb(119, 239, 112);
    }

    .cart-input {
        width: 90px;
        outline: none;
        text-align: center;
        border-radius: 2px;
        background: transparent;
    }

    .update {
        width: 150px;
        margin-top: 9px;
        background: rgb(25, 191, 17);
        outline: none;
        border: none;
        border-radius: 6px;
    }

    .update:hover {
        background: rgb(119, 239, 112);
        box-shadow: 4px 4px 4px rgb(119, 239, 112);
    }

    .update .icon {
        color: #000;
    }

    .cart-del {
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 10px;
        outline: none;
        background: rgb(216, 67, 65);
        box-shadow: 3px 3px 3px rgb(216, 67, 65);
        cursor: pointer;
    }

    .cart-del:hover {
        background: rgb(252, 103, 100);
        box-shadow: 3px 3px 3px rgb(252, 103, 100);
    }

    .small{
      font-size: 16px;
      font-weight: 500;
    }

    @media(max-width: 768px) {

      #cart-main .cart-main{
        padding: 0 30px;
      }

        #cart-main .cart-main .cart-img img {
            display: none;
        }

        .cart-input {
            width: 30px;
        }

        .cart-btn-up {
            width: 30px;
        }

        .cart-btn-down {
            width: 30px;
        }

        .update {
            width: 90px;
        }

        .cart-del{
          width: 40px;
          height: 40px;
        }
    }
</style>

@props(['cart'])

<div id="cart-main">
    <div class="cart-main">
        <table>
            <thead>
                <tr>
                    <th>
                        <h5 class="small">Product</h5>
                    </th>
                    <th>
                        <h5 class="small">Price</h5>
                    </th>
                    <th>
                        <h5 class="small">Quantity</h5>
                    </th>
                    <th>
                        <h5 class="small">Actions</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="cart-img">
                            <img src="{{'storage/' .$cart->child->product_image }}" alt="">
                        </div>
                        <div class="cart-item-name mt-2">
                            <h6>{{ $cart->child->product_name }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            <h5>$ <span>{{ $cart->price }}</span></h5>
                        </div>
                        <div class="cart-quantity">
                          <h6 class="text-10">{{$cart->quantity}}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="cart-qty">
                            <form action="/cart/update/{{ $cart->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="cart-update">
                                    <button class="cart-btn-down">
                                        -
                                    </button>
                                    <input type="hidden" name="hidden_price1"
                                        value="{{ $cart->child->product_price }}">
                                    <input type="hidden" name="hidden_price2"
                                        value="{{ $cart->child->product_price }}">
                                    <input class="cart-input" type="text" name="cart_quantity"
                                        value="1">
                                    <button class="cart-btn-up">
                                        +
                                    </button>
                                </div>
                                <div class="btn-upd">
                                    <button class="update"><span class="material-symbols-sharp icon">
                                            update
                                        </span></button>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="cart-actions">
                            <form action="/cart/delete/{{ $cart->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="cart-del"><span class="material-symbols-sharp icon">
                                        delete
                                    </span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
