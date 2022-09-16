@extends('profile.index')

@section('profile-content')
    <style>
        #profile-orders {
            padding: 20px;
            margin-bottom: 1.6rem;
        }

        #profile-orders .profile-orders table {
            border-spacing: 2px;
            border-collapse: collapse;
            width: 94%;
            padding: 10px;
            border-radius: 5px;
            transition: all .3ms ease;
            background: rgb(193, 182, 182, .5);
            cursor: pointer;
            box-shadow: 5px 5px 5px rgb(193, 182, 182);
            transform: translateX(+20px)
        }

        #profile-orders .profile-orders table:hover {
            box-shadow: none;
        }

        #profile-orders .profile-orders table thead tr th {
            margin-bottom: 15px;
            padding: 10px;
        }

        #profile-orders .profile-orders table thead tr th {
            text-align: left;
            text-shadow: 1px 1px 1px #333;
            font-size: 16px;
            font-weight: 600;
        }

        #profile-orders .profile-orders table tbody tr td {
            height: 3.5rem;
            border-bottom: 1px solid #333;
            padding: 10px;
        }

        #profile-orders .profile-orders table tbody tr td .profile-image {
            height: 50px;
            width: 50px;
            border-radius: 4px;
            object-fit: cover;
            object-position: center;
        }

        @media(max-width: 768px) {
            #profile-orders {
                padding: 0;
            }

            #profile-orders .profile-orders table thead tr th:nth-child(1) {
                display: none;
            }

            #profile-orders .profile-orders table thead tr th:nth-child(5) {
                display: none;
            }

            #profile-orders .profile-orders table thead tr th:nth-child(7) {
                display: none;
            }

            #profile-orders .profile-orders table tbody tr td:nth-child(5) {
                display: none;
            }

            #profile-orders .profile-orders table tbody tr td:nth-child(1) {
                display: none;
            }

            #profile-orders .profile-orders table tbody tr td:nth-child(7) {
                display: none;
            }
        }
    </style>

    <div id="profile-orders">
        <div class="profile-orders">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Shipping</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                <img class="profile-image" src="{{asset('storage/'.$order->check->product_image )}}" alt="">
                            </td>
                            <td>
                                {{ $order->check->product_name }}
                            </td>
                            <td>
                               $ {{ $order->check->product_price }}
                            </td>
                            <td>
                                {{ $order->status }}
                            </td>
                            <td>
                                {{ $order->order_quantity }}
                            </td>
                            <td>
                                {{ $order->shipping }}
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    @method('Delete')
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
