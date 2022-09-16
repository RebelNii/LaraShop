<style>
  #shipping .shipping{
    background: pink;
    position: relative;
    padding: 40px;
  }

  #shipping .shipping > .form-one{
    padding: 10px;
  }

  #shipping .shipping .form-one:nth-child(2) .form-two{
    display: flex;
    justify-content: space-between;
    gap: 10px;
  }

  #shipping .shipping .form-one .form-two input{
    border: none;
    outline: none;
    padding: 5px;
    width: 100%;
    border-radius: 3px;
    box-shadow: 3px 3px 3px rgb(247, 217, 217);
  }
</style>


<div id="shipping">
    <div class="shipping">
        <div class="form-one">
            <div class="form-two">
                <Label>Country:</Label> <br>
                <input type="text" name="country" class="country" placeholder="Country" value="{{ old('country') }}">
            </div>
            <div class="error mt-2">
                @error('country')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <div class="sec1">
                    <Label>First Name:</Label> <br>
                    <input type="text" name="first_name" class="first-name" placeholder="First Name"
                        value="{{ old('first_name') }}">
                </div>
                <div class="sec2">
                    <Label>Last Name:</Label> <br>
                    <input type="text" name="last_name" class="last-name" placeholder="Last Name"
                        value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="error">
                @error('first_name')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <Label>Address:</Label> <br>
                <input type="text" name="address" class="addres" placeholder="Address" value="{{ old('address') }}">
            </div>
            <div class="error">
                @error('address')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <Label>City:</Label> <br>
                <input type="text" name="city" class="city" placeholder="City" value="{{ old('city') }}">
            </div>
            <div class="error">
                @error('city')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <Label>Region:</Label> <br>
                <input type="text" name="region" class="region" placeholder="Region" value="{{ old('region') }}">
            </div>
            <div class="error">
                @error('region')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <Label>Postal Code:</Label> <br>
                <input type="text" name="postal" class="postal" placeholder="Postal Code"
                    value="{{ old('postal') }}">
            </div>
            <div class="error">
                @error('postal')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
            <div class="form-two">
                <Label>Phone:</Label> <br>
                <input type="tel" name="phone" class="phone" placeholder="Phone" value="{{ old('phone') }}">
            </div>
            <div class="error">
                @error('phone')
                    <p class="text-red text-10 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-one">
          <div class="form-two">
              <Label>Email:</Label> <br>
              <input type="email" name="email" class="email" placeholder="Email" value="{{ old('email') }}">
          </div>
          <div class="error">
              @error('email')
                  <p class="text-red text-10 mt-1">{{ $message }}</p>
              @enderror
          </div>
        </div>
    </div>
</div>
