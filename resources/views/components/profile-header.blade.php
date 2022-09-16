
<style>
    #profile-header{}

    #profile-header .profile-headers{
        display: flex;
        gap: 50px;
        justify-content: center;
        margin-top: 1.2rem;
        padding: 0 20px;
    }

    #profile-header .profile-headers .profile-img img{
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
    }

    #profile-header .profile-headers .profile-details .prof-dets1{
        display: inline;
        font-size: 16px;
        font-weight: 600
    }

    #profile-header .profile-links .prof-links{
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 1.2rem;
        padding: 0 20px;
        font-size: 16px;
        font-weight: 500;
    }
</style>

@props(['user'])

<div id="profile-header">
    <div class="profile-headers">
        <div class="profile-img">
            <img src="{{asset('assets/j.png')}}" alt="">
        </div>
        <div class="profile-details">
            <div class="prof-dets1">
                <span>Name: {{auth()->user()->first_name . ' ' .auth()->user()->last_name }}</span> <br>
                <span><small>Email: {{auth()->user()->email}}</small></span> <br>
                <span>Role: Customer</span> <br>
                <span>Joined on {{auth()->user()->created_at}}</span> <br>
            </div>
        </div>
    </div>
    <div class="profile-links">
        <div class="prof-links">
            <a href="/profile/orders">Purchased</a>
            <a href="">Reports</a>
            <a href="/profile/account">Account Details</a>
            <a href="/profile/password">Update Password</a>
        </div>
    </div>
</div>