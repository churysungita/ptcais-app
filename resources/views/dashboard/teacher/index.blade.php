@extends('layouts.teacher_dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <!-- item lists one -->
                <div class="row">
                    <div class="col-md-4">
                        <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4">TName:Mussa Shabani</span>
                            <br/>
                            <h6></h6>
                            <h6></h6>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">School name: Dodoma</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">District name: Chalinze</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Upload <b>countinous assessment</b></h2>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Second name</th>
                            <th>Last name</th>
                            <th>Marks</th>

                        </tr>
                        </thead>
                        <tbody id="tb_update">


                        </tbody>
                    </table>
                </div>
            </div>
        </main>


        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form method="post" action="/marks">
                            @csrf
                            <div class="input-group mb-3">
                                 <input hidden id="sid" name="studenid">
                                <input hidden id="an-tem" name="term">
                                <span class="input-group-text" id="inputGroup-sizing-default">Kiswahili</span>
                                <input type="number" name="kiswahili" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Uraia</span>
                                <input type="number" name="uraia" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Hisabati</span>
                                <input type="number" name="hisabati" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Sayansi</span>
                                <input type="number" name="sayansi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">English</span>
                                <input type="number" name="english" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" onclick="saveStudentRes()">Save</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>

        let table=$('#tb_update');
        for(let i=0; i< $('#btn-navigation')[0].children.length; i++){
            $($('#btn-navigation')[0].children[i]).click((event)=>{
                let classes=$(event.currentTarget).attr('data');
                $.ajax({
                    method:"get",
                    url:"ca",
                    data:{classes},
                    success:function (res){
                        let data=JSON.parse(res);
                        table.html('');
                        for (let i=0; i<data.length; i++){

                            table.append(`
                            <tr>
                                <td>
                                 ${data[i].first_name}
                                </td>

                                <td>${data[i].second_name}</td>

                                <td>${data[i].last_name}</td>
                                <td id="result">
                                  <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="toModal(this,${data[i].student_id})">Marks</button>
                                </td>

                        </tr>
                            `);
                        }
                    }
                })
            })
        }
        for(let i=0; i< $('#btn-navigation1')[0].children.length; i++){
            $($('#btn-navigation1')[0].children[i]).click((event)=>{
                let classes=$(event.currentTarget).attr('data');
                $.ajax({
                    method:"get",
                    url:"ca",
                    data:{classes},
                    success:function (res){
                        let data=JSON.parse(res);

                        table.html('');
                        for (let i=0; i<data.length; i++){

                            table.append(`
                            <tr>
                                <td>
                                 ${data[i].first_name}
                                </td>

                                <td>${data[i].second_name}</td>

                                <td>${data[i].last_name}</td>
                                <td id="result">
                                 <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="toModal(this,${data[i].student_id})">Marks</button>
                                </td>

                        </tr>
                            `);
                        }
                    }
                })
            })
        }

        function  toModal(elem,sid){
            $('#sid').val(sid);

        }

        function  saveStudentRes(){
            let sid=$('#sid').val();

        }

        function Term(){
            let tem=$('#an-tem').val('terminal');
        }

        function  annualSelected(){
            let tem=$('#an-tem').val("annual");
        }
    </script>




@endsection
