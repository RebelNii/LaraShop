@extends('home')

<style>
    #profiles{
        height: 100%;
        width: 100%;
        margin-bottom: 2rem;
        position: relative;
    }

    #profiles .profiles{
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
            <x-profile-account />
        </div>
        <div class="profiles-activities">
            <span>
                hi everyone
            </span>
        </div>
    </div>
</div>


@endsection