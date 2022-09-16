
<style>
    #welcome{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 23px;
        background: #333;
        border-top: 1px solid #f3f3f3;
    }

    #welcome h6, #welcome a{
        color: #f3f3f3;
        cursor: pointer;
    }

    #welcome{}
</style>

<div id="welcome">
    <div class="welcome">
        <h6>Welcome @auth {{auth()->user()->first_name}}
            @else
            Guest
        @endauth</h6>
    </div>
    <div class="admin">
        @auth
            @if (auth()->user()->role == 1)
                <h6><a href="/admin">Admin</a></h6>
            @endif
        @endauth
    </div>
</div>