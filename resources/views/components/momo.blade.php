

<div id="momo">
    <div class="momo">
        <form action="/pay" method="post">
            @csrf
            <input type="text" name="email" value="" placeholder="email"><br> <br>
            <input type="text" name="amount" value="{{auth()->user()->cart()->sum('price')}}">
            <button>Pay</button>
        </form>
    </div>
</div>