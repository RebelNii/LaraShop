<style>
  #register{
    width: 330px;
    border: 2px solid #333;
    display: flex;
    justify-content: center;
    border-radius: 10px;
    padding: 10px;
    background: rgb(132, 204, 198, .4);
  }

  #register .register h5{
    font-weight: 500;
    font-size: 20px;
    padding: 4px;
    margin: 2px 0;
  }

  #register .register form{
    padding: 10px;
  }

  #register .register form .form1{
    margin: 13px 0;
    
  }

  #register .register form .form1 .form2{
    margin: 5px 0;
  }

  #register .register form .form1 .form2 input{
    border-radius: 4px;
    width: 100%;
    padding: 4px;
    outline: none;
    border: 1px solid #333;
  }

  

  #register .register form .form1 .res-btn{
    width: 100%;
    padding: 4px;
    border-radius: 7px;
    background: rgb(234, 232, 107);
    box-shadow: 2px 2px 2px rgb(234, 232, 107);
  }

  #register .register form .form1 .res-btn:hover{
    background: rgb(107, 234, 141);
    box-shadow: 2px 2px 2px rgb(107, 234, 141);
  }
</style>


<div id="register">
    <div class="register">
      <h5>Register for an account</h5>
        <form action="/register" method="post">
            @csrf
            <div class="form1">
                <div class="form2">
                    <label for="first_name">First Name</label><br>
                    <input type="text" placeholder="First Name" value="{{old('first_name')}}" id="first_name" class="first_name"
                        name="first_name">
                </div>
                <div class="error">
                    @error('first_name')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="form2">
                    <label for="last_name">Last Name</label><br>
                    <input type="text" placeholder="Last Name" value="{{old('last_name')}}" id="last_name" class="last_name"
                        name="last_name">
                </div>
                <div class="error">
                    @error('last_name')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="form2">
                    <label for="email">Email</label><br>
                    <input type="email" placeholder="Email" value="{{old('email')}}" id="email" class="email"
                        name="email">
                </div>
                <div class="error">
                    @error('email')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="form2">
                    <label for="password">Password</label><br>
                    <input type="password" placeholder="Password" value="{{old('password')}}" id="password" class="password"
                        name="password">
                </div>
                <div class="error">
                    @error('password')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="form2">
                    <label for="password">Password</label><br>
                    <input type="password" placeholder="Password" value="{{old('password2')}}" id="password" class="password"
                        name="password2">
                </div>
                <div class="error">
                    @error('password2')
                        <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
              <button type="submit" name="submit" class="res-btn">Register</button>
            </div>
        </form>
    </div>
</div>
