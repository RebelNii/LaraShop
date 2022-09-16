@extends('home')


@section('content')

<div id="show">
    <div class="show">
        <div class="showSectionOne">
            <x-show-product :product="$product" />
        </div>
        <div class="showSectionTwo">
            <x-show-banner />
        </div>
    </div>
</div>

@endsection