@extends('home')

<Style>
    #cart{
        width: 100vw;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    #cart .cart{
        width: 100%;
    }

    #cart .cart-sum{
        display: flex;
        justify-content: end;
        padding: 0 20px;
        margin: 0 20px;
    }
</Style>

@section('content')

    <div id="cart">
        <div class="cart">
            @unless(count($carts) == 0)
                @foreach ($carts as $cart)
                    <x-cart-items :cart="$cart" />
                @endforeach
            @else
                <p>Cart is empty</p>
            @endunless
        </div>
        <div class="cart-sum">
            <x-sub-total />
        </div>
    </div>

@endsection
