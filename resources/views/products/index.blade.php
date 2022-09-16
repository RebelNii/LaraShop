@extends('home')

<style>
    #main{
        margin: 0 auto;
    }

    #main .owl{
        padding: 0 10px;
    }

    #main .main{
        padding: 10px;
        transform: translateX(+8%);
    }

    #main .p-4{
        display: flex;
        justify-content: center;
    }

    @media(max-width: 1000px){
        #main .main{
            transform: translateX(+16%);
        }
    }

    @media(max-width: 768px){
        #main .main{
            transform: translateX(+20%);
        }
    }
</style>

@section('content')

    <div id="main">
        <div class="car owl owl-carousel owl-theme">
            @foreach ($products as $product)
                <x-carousel-one :product="$product"/>
            @endforeach
        </div>
        <div class="main grid">
            @unless(count($products) == 0)
                @foreach ($products as $product)
                    <x-card :product="$product" />
                @endforeach
            @else
                <p>Nothing to display</p>
            @endunless
        </div>
        <div class="p-4 mt-5">
            {!! $products->links() !!}
        </div>
    </div>
@endsection
