@extends('home')

<style>
    #momo{
        display: flex;
        justify-content: center;
        background: rgb(244, 247, 249);
    }

    #momo .momo{
        padding: 30px;
    }

    .mo2{
        margin-top: 1rem;
    }
</style>

@section('content')
    <div id="momo">
        <div class="momo">
            <form action="/pay" method="post">
                @csrf
                <div class="mo1">
                    <x-shipping />
                </div>
                <div class="mo2">
                    <x-payment />
                </div>
            </form>
        </div>
    </div>
@endsection
