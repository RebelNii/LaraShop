@extends('home')

<style>
#sign{
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2rem 0;
}
</style>
@section('content')
<div id="sign">
    <x-login />
</div>
@endsection