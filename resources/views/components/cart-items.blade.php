<style>
    #cart-items {}

    #cart-items .cart-items {}

    #cart-items .cart-items {
        padding: 20px;
    }

    #cart-items .cart-items table {
        width: 95%;
        padding: 15px;
        background: gray
    }

    #cart-items .cart-items table thead tr th {
        padding: 10px;
        text-transform: uppercase;
        text-decoration: underline;
        font-weight: 600;
        background: rgb(191, 239, 162);
    }

    #cart-items .cart-items table tbody tr td {
        height: 3rem;
        cursor: pointer;
        background: rgb(233, 239, 162);
    }

    #cart-items .cart-items table tbody tr td .cart-qtys form .cart-upd {
        display: flex;
        gap: 10px
    }

    #cart-items .cart-items table tbody tr td .cart-qtys form .cart-upd .cart-input{
        outline: none;
        border-radius: 2px;
        text-align: center
    }

    #cart-items .cart-items table tbody tr td .cart-qtys form .cart-upd .cart-btns .btnss {
        outline: none;
        border-radius: 2px;
    }

    #cart-items .cart-items {}


    .cart-img img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        object-position: center;
    }

    .cart-btn-down {
        cursor: pointer;
    }

    .cart-actions {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-actions .icon {
        color: tomato;
    }

    .upd-btn {
        width: 40%;
        background: goldenrod;
        outline: none;
        border: none;
    }

    @media(max-width: 476px) {
        #cart-items .cart-items table thead tr th:first-child {
            display: none;
        }

        #cart-items .cart-items table thead tr th:nth-child(2) {
            width: 70%;
        }

        #cart-items .cart-items table tbody tr td {
            height: 5rem;
        }

        #cart-items .cart-items table tbody tr td:first-child {
            display: none;
        }

        #cart-items .cart-items table tbody tr td .cart-qtys form .cart-upd .cart-input {
            width: 70px;
        }

        .upd-btn {
            width: 100%;
            background: goldenrod
        }
    }
</style>

@props(['cart'])

<div id="cart-items">
    <div class="cart-items">
        <table>
            <thead>
                <tr>
                    <th>
                        <h6>Image</h6>
                    </th>
                    <th>
                        <h6>Price</h6>
                    </th>
                    <th>
                        <h6>Quantity</h6>
                    </th>
                    <th>
                        <h6>Action</h6>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="cart-img">
                            <img src="{{ asset('storage/' . $cart->child->product_image) }}" alt="">
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
                            <h6 class="text-10">QTY: {{ $cart->quantity }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="cart-qtys">
                            <form action="/cart/update/{{ $cart->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="cart-upd">
                                    <div class="cart-btns">
                                        <button class="cart-btn-down btnss" id="btns-d">-</button>
                                    </div>
                                    <div class="cart-inputs">
                                        <input type="hidden" name="hidden_price1"
                                            value="{{ $cart->child->product_price }}">
                                        <input type="hidden" name="hidden_price2"
                                            value="{{ $cart->child->product_price }}">
                                        <input class="cart-input" type="text" name="cart_quantity" value="1">
                                    </div>
                                    <div class="cart-btns">
                                        <button class="cart-btn-up btnss" id="btns-d">+</button>
                                    </div>
                                </div>
                                <div class="btn-upd">
                                    <button class="upd-btn">
                                        <span class="material-symbols-sharp icon">
                                            update
                                        </span>
                                    </button>
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
