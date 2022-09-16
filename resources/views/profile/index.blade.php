@extends('home')

<style>
    #profiles{
        margin-bottom: 1rem;
        position: relative;
    }

    #profiles .profile{
        padding: 0 10px
    }

    #profile .profile .profile-content{
        
    }

    #profile .profile .profile-activities{
        
    }
</style>

@section('content')

<div id="profiles">
    <div class="profiles">
        <div class="profile-header">
            <x-profile-header />
        </div>
        <div class="profile-content">
            @yield('profile-content')
        </div>
        <div class="profile-activities">
            <span>hellos</span>
        </div>
    </div>
</div>


@endsection