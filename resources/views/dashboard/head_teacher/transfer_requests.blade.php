@extends('layouts.head_teacher_dashboard')
@section('content')

   <div id="layoutSidenav_content">
          <main>
                <div class="container">
                    <h1 class="mt-4">Transfer requests</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ url('head_teacher') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage pupils transfer requests</li>
                    </ol>
                    <div class="row mb-4">


                        @if($transferCount > 0)

                            <div class="container">
                                <div class="row">
                                    <i class=""></i>Pupils transfer requests lists
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



                                        @for($i=0; $i<$transferCount; $i++)
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
                                                    <button type="button " id="btn-confirm" class="btn btn-primary "
                                                            data-id="{{ $transferRequest[$i]->transfer_id }}"
                                                            onclick="confirmFun(this.getAttribute('data-id'))">comfirm</button>
                                                </td>
                                                <td>
                                                    <div class="alert" role="alert" id="result" >
                                                        {{$transferRequest[$i]->HT_status }}
                                                    </div>
                                                </td>
                                            </tr>

                                        @endfor





                                        {{--@foreach($transferRequest as $transReq)


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

                                        @endforeach--}}


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


                        @else

                            <h3>Custom Notification to notify the headmaster that there is no transfer request </h3>


                        @endif
                    </div>
                </div>
          </main>
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
