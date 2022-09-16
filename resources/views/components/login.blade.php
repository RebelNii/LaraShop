<style>
    #login {
        width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        height: 500px;
        border: 2px solid #333;
        background: rgb(132, 204, 198, .4);
        border-radius: 10px;
    }

    #login .login h5{
      display: flex;
      gap: .6rem;
      justify-content: center;
      font-size: 23px;
    }

    #login .login form .form1{
        margin: 1rem 0;
    }

    #login .login form .form1 .form2 input{
        outline: none;
        border-radius: 4px;
        border: 1px solid #000;
        width: 100%;
        padding: .2rem;
    }

    #login .login form .form1 .form2 .input::placeholder{
        color: #000;
        text-align: center;
    }

    #login .login form .form1 .form2 {
        position: relative;
    }

    #login .login form .form1 .form2 .visible  .eye{
        font-size: 18px;
    }

    #login .login form .form1 .form2 .visible{
        position: absolute;
        top: 30px;
        right: 3px;
        cursor: pointer;
    }

    #login .login form .form1 .login-btn{
      margin: 0 auto;
      background: rgb(71, 247, 147);
      outline: none;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
      transition: all 300ms ease;
      width: 100%;
      border-radius: 4px;
      padding: 2px;
    }
</style>

<div id="login">
    <div class="login">
        <h5><span class="material-symbols-sharp">login</span>Login</h5>
        <form action="/store" method="post">
            @csrf
            <div class="form1">
                <div class="form2">
                    <label for="Email">Email</label><br>
                    <input type="email" autocomplete="off" placeholder="Email" value="" id="email" class="email" name="email">
                </div>
                <div class="error">
                    @error('email')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="form2">
                    <label for="Email">Password</label><br>
                    <input type="password" placeholder="Password" value="" id="password" class="password eye-pswd"
                        name="password"
                    >
                    <div class="visible">
                        <span class="material-symbols-sharp eye">
                            visibility
                        </span>
                    </div>
                </div>
                <div class="error">
                    @error('password')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <button class="login-btn" type="submit" name="submit">Login</button>
            </div>
            <div class="form1">
                <h6>Don't have an account? <a href="/redirect">Register</a></h6>
            </div>
            <div class="form1">
                <h6>Forgot Password? <a href="/forgotpass">Reset Password</a></h6>
            </div>
        </form>
    </div>
</div>
