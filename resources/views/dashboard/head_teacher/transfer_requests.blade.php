@extends('layouts.head_teacher_dashboard')
@section('content')

    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Transfer requests</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('head_teacher') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage pupils transfer requests</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="container">
                            <div class="card-body">

                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>Pupils transfer requests lists
                            </div>
                            <div class="card-body">
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



                                    @foreach($transferRequest as $transReq)


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
                                                <button type="button " id="btn-confirm" class="btn btn-primary "
                                                        data-id="{{ $transReq['transfer_id'] }}"
                                                        onclick="confirmFun(this.getAttribute('data-id'))">comfirm</button>
                                            </td>
                                            <td>
                                                <div class="alert" role="alert" id="result" >
                                                    {{ $transReq['HT_status'] }}
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                                <!-- =======modal control transfer======= -->

                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <p>Manage transfer requests</p>
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <textarea placeholder="Fill the reason here if any" rows="10"
                                                          name="comments" id="comment_text" cols="40"
                                                          class="ui-autocomplete-input" autocomplete="off"
                                                          role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="modal-btn-approved">Approved</button>
                                                <button type="button" class="btn btn-danger" id="modal-btn-cancelled">Cancelled</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
            <footer class="py-4 bg-light mt-auto ">

            </footer>
        </div>

    </div>

@endsection

<script>
     function  confirmFun(id){
         let to=$('#token').val();
         $.ajax(
             {
                 method:'post',
                 url:'update_status',
                 data:{_token: to,id},
                 success: function (res){

                    location.reload();
                 }
             }
         )
     }
</script>
