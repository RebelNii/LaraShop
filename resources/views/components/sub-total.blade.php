
<style>
  #subToatl{
    margin-bottom: 2rem;
  }

  #subTotal .sideOne h5 span{
    text-decoration: underline;
    font-weight: 600;
    cursor: pointer;
  }

  #subTotal > div{
    margin-bottom: .7rem;
  }

  #subTotal .sideTwo .partOne form button{
    outline: none;
    border: none;
    width: 150px;
    margin-bottom: 1rem;
    padding: .5rem;
    border-radius: 3px;
    background: rgb(100, 184, 252);
    box-shadow: 3px 3px 3px rgb(100, 184, 252);
    cursor: pointer;
  }

  #subTotal .sideTwo .partTwo form button{
    outline: none;
    border: none;
    width: 150px;
    padding: .5rem;
    border-radius: 3px;
    background: rgb(100, 252, 146);
    box-shadow: 3px 3px 3px rgb(100, 252, 146);
    cursor: pointer;
  }
</style>

<div id="subTotal">
  <div class="sideOne">
    <h5>Total: $<span>{{auth()->user()->cart()->sum('price') }}</span></h5>
  </div>
  <div class="sideTwo">
    <div class="partOne">
      <form action="/cashout" method="get">
        <Button>
          CheckOut
        </Button>
      </form>
    </div>
    <div class="partTwo">
      <form action="/">
        @csrf
        <Button>
          Continue Shopping
        </Button>
      </form>
    </div>
    <div class="partTwo mt-3">
      <form action="/paystackss" method="get">
        @csrf
        <Button>
          MoMo
        </Button>
      </form>
    </div>
  </div>
</div>