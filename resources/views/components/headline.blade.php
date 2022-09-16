

<style>
  #headline{
    background: #333;
    width: 100%;
  }
  .headline{
    padding: 12px;
    display: flex;
    justify-content: space-between;
  }

  .headline .headline-one h5{
    color: #fff;
    font-size: 16px;
  }

  .headline .headline-one h5 span{
    font-size: 12px;
    text-decoration: underline;
  }

  .headline .headline-two{
    position: relative;
    justify-content: center;
    padding: 0 10px;
  }

  .headline .headline-two a{
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
  }
</style>

<div id="headline">
  <div class="headline">
    <div class="headline-one">
      <h5>Customer Support & Sales: <span>888-123-6677</span></h5>
    </div>
    <div class="headline-two">
      @auth <a href="/logout"><span>Logout</span></a>  @else
      <a href="/login"><span>Login</span></a>
      @endauth
    </div>
  </div>
</div>