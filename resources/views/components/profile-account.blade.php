@extends('profile.index')


@section('profile-content')
    <style>
        .wrap #profile-account {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .wrap #profile-account .profile-account form {
            width: 300px;
            border: 1px solid rgb(145, 101, 117);
            padding: 50px;
            border-radius: 6px;
            box-shadow: 4px 4px 4px rgb(145, 101, 117);
            background: rgb(198, 206, 199);
        }

        .wrap #profile-account .profile-account form>div {
            margin: 20px 0;
        }

        .wrap #profile-account .profile-account form .form1>div {
            margin: 9px 0;
        }

        .wrap #profile-account .profile-account form .form1 .profile1 input {
            width: 100%;
            outline: none;
            border: none;
            border-bottom: 2px solid rgb(165, 112, 159);
            padding: 5px;
        }

        .wrap #profile-account .profile-account form .form1 .preview {
            display: none;
        }

        .wrap #profile-account .profile-account form .form1 .preview img {
            width: 150px;
            height: 100px;
            object-fit: contain;
            object-position: center;
        }

        .wrap #profile-account .profile-account form .form1 .profile-btn {
            transition: all 3ms ease;
            padding: 5px;
            text-transform: uppercase;
            font-weight: 500;
            text-shadow: 1px 1px 1px #333;
            width: 100%;
            box-shadow: 3px 3px 3px rgb(158, 113, 152);
            background: rgb(158, 113, 152);
            outline: none;
            border: none;
            border-radius: 3px;
        }

        .wrap #profile-account .profile-account form .form1 .profile-btn:hover {
            background: rgb(211, 131, 202);
            box-shadow: 3px 3px 3px rgb(211, 131, 202);
        }
    </style>
    <div class="wrap">
        <div id="profile-account">
            <div class="profile-account">

                <form action="/profile/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5><b>Account info</b></h5>
                    <div class="form1">
                        <div class="profile1">
                            <label for="">First Name</label> <br>
                            <input value="{{ auth()->user()->first_name }}" type="text" name="firstname" id="firstname"
                                placeholder="First Name">
                        </div>
                        <div class="profile2">
                            @error('firstname')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form1">
                        <div class="profile1">
                            <label for="">Last Name</label> <br>
                            <input value="{{ auth()->user()->last_name }}" type="text" name="lastname" id="lastname"
                                placeholder="Last Name">
                        </div>
                        <div class="profile2">
                            @error('lastname')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form1">
                        <div class="profile1">
                            <label for="">Email</label> <br>
                            <input value="{{ auth()->user()->email }}" type="email" name="email" id="email"
                                placeholder="Email">
                        </div>
                        <div class="profile2">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form1">
                        <div class="profile1">
                            <label for="">Profile Picture</label> <br>
                            <input value="" type="file" name="file" id="file">
                        </div>
                        <div class="preview" id="preview">
                            <img src="" alt="" id="imagePreview" class="imagePreview">
                        </div>
                        <div class="profile2">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form1">
                        <button class="profile-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
