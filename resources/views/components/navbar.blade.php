<style>
    #navbar {
        width: 100vw;
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        background: #0d0c22
    }

    a {
        text-decoration: none;
        color: #000;
    }



    #navbar .nav-left {
        display: flex;
        justify-content: center;
        gap: 1rem;
        position: relative;
        align-items: center;
        padding: 1rem;
        width: 100%;
        margin-top: 15px;
    }

    #navbar .nav-left .top {
        display: flex;
        justify-content: center;
    }

    #navbar .nav-left .top img {
        height: 50px;
        width: 50px;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
        transform: translateX(-90px);
    }

    #navbar .nav-left .menu ul {
        display: flex;
        list-style: none;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        gap: 1.5rem;
        padding: 0 .7rem;
        width: 100%;
    }

    #navbar .nav-left .menu ul li {
        padding: .7rem;
        height: 3rem;
        border-radius: 10px;
        position: relative;
        background: #f3f3f3;
        place-items: center;
        place-content: center;
        text-align: center;
        width: 120px;
    }

    #navbar .nav-left .menu ul li .sub-menu {
        position: absolute;
        z-index: 3;
        text-align: center;
        justify-content: center;
        width: 100%;
        display: none
    }

    #navbar .nav-left .menu ul li .sub-menu ul {
        display: inline;
        text-align: center;
        width: 100%;
    }

    #navbar .nav-left .menu ul li .sub-menu ul li {
        transition: 300ms all ease;
        margin-bottom: 7px;
        text-align: center;
        background: blue;
        width: 129px;
    }

    #navbar .nav-left .menu ul li .sub-menu ul li a {
        text-align: center;
    }

    #navbar .nav-left .menu ul li:first-child:hover .menu-1 {
        display: block
    }

    #navbar .nav-left .menu ul li:last-child:hover .menu-2 {
        display: block
    }

    #navbar .nav-left .menu ul li .menu-1 {
        transform: translateX(-16px);
    }

    #navbar .nav-left .menu ul li .menu-2 {
        transform: translateX(-16px);
    }

    #navbar .nav-left .menu ul li .menu-1 ul li {
        background: rgb(75, 234, 120);
    }

    #navbar .nav-left .menu ul li .menu-2 ul li {
        background: rgb(75, 170, 234);
    }

    #navbar .nav-left .menu ul li:nth-child(2) .cart-num {
        font-weight: 500;
        background: rgb(201, 239, 112, .5);
        position: absolute;
        top: 0;
        width: 40px;
        font-size: 18px;
        color: #333;
        border-radius: 90px;
    }

    .icons {
        font-size: 14px;
    }

    /*right section*/
    #navbar .nav-right {
        display: flex;
        margin-right: 10px;
        width: 50%;
        transform: translateX(+100px);
    }

    #navbar .nav-right #search {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #navbar .nav-right #search .locate {
        position: relative;
    }

    #navbar .nav-right #search .locate .search {
        width: 100%;
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
        padding-left: 2.5rem;
        border: 2px solid transparent;
        border-radius: 8px;
        outline: none;
        background-color: #f3f3f4;
        color: #0d0c22;
        transition: .3s ease;
    }

    #navbar .nav-right #search .locate .icon {
        position: absolute;
        right: .5rem;
        font-size: 20px;
        top: 12px;
    }

    @media(max-width: 1000px) {
        #navbar .nav-left .top {
            display: none;
        }

        #navbar .nav-right {
            transform: translateX(-20px);
        }
    }

    @media(max-width:768px) {
        #navbar .nav-right {
            display: none;
        }
    }
</style>


<div id="navbar">
    <div class="nav-left">
        <div class="top">
            <a href="/"><img src="{{ asset('assets/j.png') }}" alt=""></a>
        </div>
        <div class="menu">
            <ul>
                <li class="nav1">Menu<span class="material-symbols-sharp icons">expand_more</span>
                    <div class="sub-menu menu-1">
                        <ul>
                            <li><a href="/">Home</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="/cart">Cart</a> <span class="cart-num">@auth
                            {{ auth()->user()->cart()->count('id') }}
                        @endauth
                    </span></li>
                <li class="nav2"><a href="/profile">Account</a><span
                        class="material-symbols-sharp icons">expand_more</span>
                    <div class="sub-menu menu-2">
                        <ul>
                            <li><a href="/wishlist">Wishlist</a></li>
                            <li><a href="">Reservation</a></li>
                            @auth
                                @if (auth()->user()->role == 1)
                                    <li><a href="/admin">Admin</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="nav-right">
        <div id="search">
            <div class="locate">
                <form action="/">
                    @csrf
                    <input type="search" placeholder="search" class="search" name="search">
                    <span class="material-symbols-sharp icon">
                        search
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>
