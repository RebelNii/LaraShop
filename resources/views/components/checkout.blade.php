<style>
  #payment .payment > .formOne{
    padding: 10px;
  }

  #payment .payment .formOne .formTwo select{
    width: 100%;
    outline: none;
    border: none;
    padding: 4px;
    border-radius: 2px;
    cursor: pointer;
  }

  #payment .payment .formOne .formTwo input{
    width: 100%;
    outline: none;
    border: none;
    border-radius: 2px;
    padding: 4px;
    text-align: center;
  }

  #payment .payment .formOne .child{
    display: flex;
    gap: 10px;
    justify-content: space-between;
  }

  
</style>

<div id="payment">
    <div class="payment">
        <h5 class="d-flex"><span class="material-symbols-sharp">lock</span> SECURE PAYMENT</h5>
        <div class="formOne">
            <div class="formTwo">
                <Label>Card Type:</Label> <br>
                <select name="cardType" id="">
                    <option value=""></option>
                    <option value="mastercard">MasterCard</option>
                    <option value="visa">Visa</option>
                    <option value="amex">Amex</option>
                </select>
            </div>
        </div>
        <div class="formOne">
          <div class="formTwo">
            <label for="">Credit Card Number:</label> <br>
            <input type="tel" name="cc" class="cc" placeholder="Credit Card Number">
          </div>
          <div class="err">
            @error('cc')
              <p>{{@message}}</p>
            @enderror
          </div>
        </div>
        <div class="formOne">
          <div class="formTwo">
            <label for="">Card CVV:</label> <br>
            <input type="text" name="cvv" class="cvv" placeholder="CVV">
          </div>
          <div class="err">
            @error('cc')
              <p>{{@message}}</p>
            @enderror
          </div>
        </div>
        <div class="formOne">
          <div class="formTwo child">
            <div class="sect1">
              <Label>Month:</Label> <br>
              <select name="month" id="">
                <option value="">Month</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="sect2">
              <label for="">Year:</label> <br>
              <select name="year" id="year">
                <option value="">Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                <option value="2031">2032</option>
                <option value="2033">2033</option>
                <option value="2034">2034</option>
              </select>
            </div>
          </div>
        </div>
    </div>
</div>
