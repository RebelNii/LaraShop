@extends('profile.index')

@section('profile-content')

<style>
    #profile-password{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1.4rem;
        margin-bottom: 1.4rem;
    }

    #profile-password .profile-password{}

    #profile-password .profile-password form{
        width: 400px;
        border: 2px solid rgb(175, 191, 184);
        padding: 50px;
        box-shadow: 3px 3px 3px rgb(175, 191, 184);
        cursor: pointer;
        font-size: 16px;
        font-weight: 400;
        background: rgb(198, 206, 199);
    }

    #profile-password .profile-password form > div{
        margin: 14px 0;
    }

    #profile-password .profile-password form .form1 input{
        width: 100%;
        outline: none;
        display: block;
        padding: 4px;
    }

    #profile-password .profile-password form .form1 .profile-updateBtn{
        width: 100%;
        outline: none;
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        padding: 5px;
        background: rgb(139, 239, 155);
        box-shadow: 2px 2px 2px rgb(139, 239, 155);
    }
</style>

<div id="profile-password">
    <div class="profile-password">
        <form action="/profile/update" method="post">
            @csrf
            @method('PUT')
            <h5>Update Password</h5>
            <hr>
            <div class="form1">
                <div class="prof-pass">
                    <label for="">Old Password</label> <br>
                    <input type="password" name="oldPassword" id="oldPassword" placeholder="Old Password">
                </div>
                <div class="error">
                    @error('oldPassword')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="prof-pass">
                    <label for="">New Password</label> <br>
                    <input type="password" name="newPassword" id="newPassword" placeholder="New Password">
                </div>
                <div class="error">
                    @error('newPassword')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <div class="prof-pass">
                    <label for="">New Password</label> <br>
                    <input type="password" name="newPassword2" id="newPassword2" placeholder="New Password">
                </div>
                <div class="error">
                    @error('newPassword2')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form1">
                <button class="profile-updateBtn">Update Password</button>
            </div>
        </form>
    </div>
</div>


@endsection