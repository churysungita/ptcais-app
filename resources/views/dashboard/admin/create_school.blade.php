@extends('layouts.admin_dashboard')
@section('content')


    <div id="layoutSidenav_content">
        <div class="container mt-3">
            <h3>Add school Form</h3>
            <form action="/create_school" id="bootstrap-form"  method="post">
                @csrf

                <div class="col-md-6 mb-3 mt-3">
                    <input type="text" class="form-control" id="school_name" placeholder="Enter school name" name="school_name" required>

                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <input type="text" class="form-control" id="reg_number" placeholder="Enter registration number" name="reg_number" required>

                </div>


                <div class="col-md-6 mb-3 mt-3">
                    <select class="form-select" id="select-bootstrap" required placeholder="Enter region" name="region_name"  onchange="loadDistricts(this.value)">

                        <option value="">Select Region</option>
                        @for($i=0; $i<count($regions); $i++)
                            <option value="{{ $regions[$i]->name }}">{{ $regions[$i]->name }}</option>
                        @endfor

                    </select>
                </div>



                <div class="col-md-6 mb-3 mt-3">

                    <select class="form-select" id="dis" required placeholder="Enter district name" name="district_name" >
                        <option value="">Select District</option>
                    </select>

                </div>



                <div class="col-md-6 mb-3 mt-3">
                    <select type="text" class="form-select" id="school_status" placeholder="select school status" name="school_status" required>
                        <option value="">select school status</option>
                        <option value="Government" name="government">Government</option>
                        <option value="Private" name="private">Private</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary" value="Validate" onclick="Validate()">create school</button>
            </form>
        </div>

    </div>


    <script>

        function  loadDistricts(region){
            let dis=$('#dis');
            $.ajax(({
                method:"GET",
                url:"districts",
                data:{data:region},
                success:function (res){
                    let da=JSON.parse(res);
                    dis.html("");
                    dis.append(`<option value="">Select District</option>`);
                    for(let i=0; i<da.length; i++){

                        dis.append(`
                     <option value="${da[i].district}" name="${da[i].district}"> ${da[i].district} </option>
                    `)

                    }



                }
            }))
        }




    </script>

@endsection
