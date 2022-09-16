
<style>
    #mailpass{
        margin-top: 2rem;
    }

    #mailpass .mailpass{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #mailpass .mailpass{}

    #mailpass .mailpass{}

    #mailpass .mailpass{}
</style>

<div id="mailpass">
    <div class="mailpass">
        <form action="/mailupdate" method="POST">
            @csrf
            @method('PUT')
            <div class="mailform1">
                <label for="">Email</label> <br>
                <input type="text" name="mailemail" placeholder="Email">
            </div>
            <div class="mailform1">
                <label for="">Password</label> <br>
                <input type="password" name="mailpassword" placeholder="Password">
            </div>
            <div class="mailform1">
                <label for="">Confirm Password</label> <br>
                <input type="password" name="mailpassword2" placeholder="Password">
            </div>
        </form>
    </div>
</div>
