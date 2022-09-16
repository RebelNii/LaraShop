<style>
    #forgotpassword {}

    #forgotpassword .forgotpassword {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    #forgotpassword .forgotpassword form{
        width: 255px;
    }

    #forgotpassword .forgotpassword form>div {
        margin: 1rem 0;
    }

    #forgotpassword .forgotpassword form .forgot-form1 input {
        padding: 7px;
        width: 100%;
        border-radius: 3px;
        outline: none;
        appearance: none;
    }

    #forgotpassword .forgotpassword form .forgot-form1 button{
        outline: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        border-radius: 2px;
        background: rgb(144, 237, 200);
    }
</style>

<div id="forgotpassword">
    <div class="forgotpassword">
        <form action="/resetpassword" method="POST">
            @csrf
            <div class="forgot-form1">
                <label for="">Reset Password</label> <br>
                <input type="text" name="forgotemail" placeholder="Email">
            </div>
            <div class="forgot-form1">
                <button>Reset Password</button>
            </div>
        </form>
    </div>
</div>
