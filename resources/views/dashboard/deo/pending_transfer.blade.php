<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PTCAIS - Deo</title>
    <!--<link href="{{ asset('css/deo/styles2.css') }}" rel="stylesheet" />-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- for modal controlling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<!--    <div class="container">-->
<!--        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">-->
    <!-- Navbar Brand-->
<!--    <a class="navbar-brand ps-3" href="{{ url('dashboard') }}">PTCAIS</a>-->
    <!-- Sidebar Toggle-->
<!--    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>-->
    <!-- Navbar Search-->
<!--    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">-->
<!--        <div class="input-group">-->
<!--        </div>-->
<!--    </form>-->
    <!-- Navbar-->
<!--    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">-->
<!--        <li class="nav-item dropdown">-->
<!--            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>-->
<!--            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->

<!--                <li>-->
<!--                    <hr class="dropdown-divider" />-->
<!--                </li>-->
<!--                <li><a class="dropdown-item" href="{{ url('/') }}">Logout</a></li>-->
<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->

<!--    </div>-->
 <main>
            <div class="container">
                <h1 class="mt-4">Transfer requests</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('deo_dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage pupils transfer requests</li>
                </ol>
               <div class="row mb-4">

                    <div class="container">
                            <div class="row">
                                <i class="">Pupils transfer requests lists</i>
                            </div>
                        <div class="container">
                            <table>
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>District From</th>
                                    <th>Region To</th>
                                    <th>District To </th>
                                    <th>School To</th>
                                    <th>Reasons for Transfer</th>
                                    <th>Manage</th>

                                    <th>Status</th>

                                </tr>
                                </thead>

                                <tbody id="user_tbody">



                              {{--  @foreach($transferRequest as $transReq)


                                    <tr>
                                        <td>{{ $transReq['first_name'] }} </td>
                                        <td>{{ $transReq['second_name'] }}</td>
                                        <td>{{ $transReq['last_name'] }}</td>
                                        <td>{{ $transReq['age'] }}</td>
                                        <td>{{ $transReq['gender'] }}</td>
                                        <td>{{ $transReq['districtFrom'] }}</td>
                                        <td>{{ $transReq['regionTo'] }}</td>
                                        <td>{{ $transReq['districtTo'] }}</td>
                                        <td>{{ $transReq['schoolTo'] }} </td>
                                        <td>{{ $transReq['reason'] }} </td>
                                        <td>
                                            <!-- Trigger/Open The Modal -->
--}}{{--                                            <button type="button " id="btn-confirm" class="btn btn-primary" data-toggle="modal" data-target="#myModal">comfirm</button>--}}{{--
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@getbootstrap" data-transfer-id="{{ $transReq['transfer_id'] }}" onclick="sendToModal(this.getAttribute('data-transfer-id'))">Confirm</button>

                                        </td>
                                        <td>
                                            <div class="alert" role="alert" id="result">
                                                {{ $transReq['DEO_status'] }}
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach--}}



                                @for($i=0; $i<count($transferRequest); $i++)


                                    <tr>
                                        <td>{{ $transferRequest[$i]->first_name }} </td>
                                        <td>{{ $transferRequest[$i]->second_name }}</td>
                                        <td>{{ $transferRequest[$i]->last_name }}</td>
                                        <td>{{ $transferRequest[$i]->age }}</td>
                                        <td>{{ $transferRequest[$i]->gender }}</td>
                                        <td>{{ $transferRequest[$i]->districtFrom }}</td>
                                        <td>{{ $transferRequest[$i]->regionTo }}</td>
                                        <td>{{ $transferRequest[$i]->districtTo }}</td>
                                        <td>{{ $transferRequest[$i]->schoolTo }} </td>
                                        <td>{{ $transferRequest[$i]->reason }} </td>
                                        <td>
                                            <!-- Trigger/Open The Modal -->
                                            {{--                                            <button type="button " id="btn-confirm" class="btn btn-primary" data-toggle="modal" data-target="#myModal">comfirm</button>--}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@getbootstrap" data-transfer-id="{{ $transferRequest[$i]->transfer_id }}" onclick="sendToModal(this.getAttribute('data-transfer-id'))">Confirm</button>

                                        </td>
                                        <td>
                                            <div class="alert" role="alert" id="result">
                                                {{ $transferRequest[$i]->DEO_status }}
                                            </div>
                                        </td>
                                    </tr>

                                @endfor


                                </tbody>
                            </table>


{{--                            --}}{{--<!-- =======modal control transfer======= -->--}}
{{--                            <form id="myModal" class="modal" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="modal-content">--}}
{{--                                    <span class="close">&times</span>--}}
{{--                                    <p>Manage transfer requests</p>--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}

{{--                                            <textarea placeholder="Fill the reason here if any" rows="10" name="comments" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="submit" class="btn btn-success" id="modal-btn-approved">Approved</button>--}}
{{--                                            <button type="submit" class="btn btn-danger" id="modal-btn-cancelled">Cancelled</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}

{{--                            Modal--}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div class="mb-3">

                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" name="" id="message-text"></textarea>
                                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="id" value="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger" onclick="sendData('declined');">Decline</button>
                                                    <button type="submit" class="btn btn-success" onclick="sendData('approved');">Approve</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>

        </main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!--<script src="{{ asset('js/deo/scripts.js') }} "></script>-->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest " crossorigin="anonymous "></script>
<!--<script src="{{ asset('js/deo/manage_transfer.js') }}"></script>-->
   <script>



        function  sendData(input) {
            let to=$('#token').val();
            let message=$('#message-text').val().trim();
            let id=$('#id').val().trim();

            $.ajax(
                {
                    method:'post',
                    url:'pending_transfer',
                    data:{input,_token: to,message,id},
                    success: function (res){

                        loadStatus();
                    }
                }
            )
        }
       function sendToModal(id)
       {
           $('#id').val(id);
       }



       function  loadStatus()
       {
           let to=$('#token').val();
           let message=$('#message-text').val().trim();
           let id=$('#id').val().trim();
           $.ajax(
               {
                   method:'get',
                   url:'load_status',
                   data:{_token: to,id},
                   success: function (res){
                       let d=JSON.parse(res);

                        location.reload();
                   }
               }
           )

       }


        // $(document).ready(()=>{
        //     loadStatus();
        // })


   </script>
</body>

</html>

