@extends('admin')


@section('admin')

<style>
    #filter{
        margin-top: 2rem;

    }

    #filter form input{
        outline: none;
        border: none;
        border-radius: 7px;
        width: 95%;
        margin-bottom: 7px;
        padding: 10px;
        color: #333;
        background: rgb(244, 211, 193);
    }

    #adminUsers .adminUsers{
    }

    #adminUsers .adminUsers{}

    #adminUsers .adminUsers table {
        border-spacing: 2px;
        border-collapse: collapse;
        border-radius: 7px;
        padding: 15px;
        width: 94%;
        cursor: pointer;
        background: rgb(215, 224, 221);
    }

    #adminUsers .adminUsers table thead tr th{
        padding: 10px;
        margin-bottom: 10px;
    }

    #adminUsers .adminUsers table tbody tr td{
        padding: 10px;
        border-bottom: 1px solid #333;
    }

    @media(max-width: 768px){
        #adminUsers .adminUsers table thead tr th:nth-child(2){
            display: none;
        }

        #adminUsers .adminUsers table tbody tr td:nth-child(2){
            display: none;
        }
    }
   


</style>

<div id="filter">
    <form action="/admin/users">
        @csrf
        <input type="search" name="search" id="search" placeholder="Search">
    </form>
</div>
<div id="adminUsers">
    <div class="adminUsers">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <a href="/admin/users/{{$user->id}}">
                            <td><span>{{$user->first_name}}</span></td>
                            <td><span>{{$user->last_name}}</span></td>
                            <td><span>{{$user->email}}</span></td>
                        </a>
                        <td><button>Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection