@extends('home')

<style>
    #checkout{
        display: flex;
        justify-content: center;
        background: rgb(244, 247, 249)
    }

    #checkout .checkout{
        padding: 30px;
    }

    #checkout .checkout form .checkout2{
        margin-top: 1.5rem;
        background: rgb(142, 195, 242);
        padding: 30px;
    }

    #checkout .checkout form .checkout3{
        margin-top: 1.5rem;
    }
</style>

@section('content')

<div id="checkout">
    <div class="checkout">
        <h5>Checkout</h5>
        <form action="/stripe" method="POST">
            @csrf
            <div class="chechout1">
                <x-shipping />
            </div>
            <div class="checkout2">
                <x-checkout />
            </div>
            <div class="checkout3">
                <x-payment />
            </div>
        </form>
    </div>
</div>


@endsection