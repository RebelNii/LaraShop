@extends('admin')

@section('admin')

    <style>
        #adminIndex {}

        #adminIndex .adminIndex {
            margin-top: 2rem;
        }

        #adminIndex .adminIndex .section-1 {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            background: rgb(164, 244, 190, .6);
            padding: 10px;
            border-radius: 4px;
        }

        #adminIndex .adminIndex .section-1 h4,
        #adminIndex .adminIndex .section-1 h5 {
            border-bottom: 1px solid #333;
            color: #000;
            text-transform: uppercase;
            font-size: 16px;
        }

        #adminIndex .adminIndex .section-3 {
            margin-top: 1.5rem;
            cursor: pointer;
        }

        #adminIndex .adminIndex .section-3 h5 {
            display: flex;
            justify-content: center;
        }

        #adminIndex .adminIndex .section-3 .activities {
            display: flex;
            gap: 40px;
            justify-content: space-evenly;
            align-items: center;
            background: lavender
        }

        #adminIndex .adminIndex .section-3 .activities .admin-activities h6,
        #adminIndex .adminIndex .section-3 .activities .client-activities h6 {
            text-transform: uppercase;
            margin-top: 4px;
            display: flex;
            border-bottom: 1px solid #000;
        }

        #adminIndex .adminIndex .section-3 .activities .admin-activities span,
        #adminIndex .adminIndex .section-3 .activities .client-activities span {
            display: flex;
            flex-direction: column;
        }

        #adminIndex .adminIndex .section-3 {}

        @media(max-width: 478px) {
            #adminIndex .adminIndex .section-1 {
                padding: 5px;
                justify-content: space-around;
            }
        }
    </style>

    <div id="adminIndex">
        <div class="adminIndex">
            <div class="section-1">
                <h4>Dashboard</h4>
                <h5>Date: {{ now() }}</h5>
            </div>
            <div class="section-2">
                <x-admin-charts :users='$users' :products='$products' :checkouts='$checkouts' />
            </div>
            <div class="section-3">
                <h5>Recent Activities</h5>
                <hr>
                <div class="activities">
                    <div class="client-activities">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <h6>Client Activities</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless(count($client_activities) == 0)
                                    @foreach ($client_activities as $client)
                                        <tr>
                                            <td><span>{{ $client->activity }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No Recent Activities from Users</p>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <div class="admin-activities">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <h6>
                                            Admin Activities
                                        </h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless(count($admin_activities) == 0)
                                    @foreach ($client_activities as $admin)
                                        <tr>
                                           <td>
                                               <span>{{ $admin->admin_activity }}</span>
                                            </td> 
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No Recent Activities from Admin</p>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
