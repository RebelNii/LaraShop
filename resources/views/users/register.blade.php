@extends('home')

<style>
    #register-main{
        display: flex;
        width: 100vw;
        justify-content: center;
        align-items: center;
        margin: 2rem 0;
    }
</style>

@section('content')
<div id="register-main">
    <x-resgister />
</div>
@endsection