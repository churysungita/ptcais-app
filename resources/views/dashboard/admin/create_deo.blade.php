@extends('layouts.admin_dashboard')

@section('content')

{{--    <form action="/create_deo" method="post" >--}}
{{--        <br><br>--}}

{{--        @csrf--}}

{{--        <div>--}}
{{--            <label for="first_name">first name</label>--}}
{{--            <input id="first_name" type="text" name="first_name">--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div>--}}
{{--            <label for="second_name">second name</label>--}}
{{--            <input id="second_name" type="text" name="second_name">--}}
{{--        </div>--}}
{{--        <br>--}}

{{--        <div>--}}
{{--            <label for="last_name">last name</label>--}}
{{--            <input id="last_name" type="text" name="last_name">--}}
{{--        </div>--}}
{{--        <br>--}}

{{--        <div>--}}
{{--            <label for="region">District</label>--}}
{{--            <input id="region" type="text" name="region">--}}
{{--        </div>--}}
{{--        <br>--}}

{{--        <div>--}}
{{--            <label for="district">District</label>--}}
{{--            <input id="district" type="text" name="district">--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div>--}}
{{--            <label for="school_name">School name</label>--}}
{{--            <input id="school_name" type="text" name="school_name">--}}
{{--        </div>--}}


{{--        <button type="submit" > create deo</button>--}}


{{--    </form>--}}
    <div id="layoutSidenav_content">
        <div class="container mt-3">
            <h3>Add Deo Form</h3>


            <form action="/create_deo" id="bootstrap-form"  method="post">
                @csrf

                <div class="col-md-6 mb-3 mt-3">
                    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" required>

                </div>

                <div class="col-md-6 mb-3 mt-3">
                    <input type="text" class="form-control" id="second_name" placeholder="Enter second name" name="second_name" required>

                </div>

                <div class="col-md-6 mb-3 mt-3">
                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" required>

                </div>

                <div class="col-md-6 mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>


                <div class="col-md-6 mb-3 mt-3">

                    <select class="form-select" id="select-bootstrap" required placeholder="Region" name="region"  onchange="loadDistricts(this.value)">

                        <option value="">Select Region</option>

                        @for($i=0; $i<count($regions); $i++)
                            <option value="{{ $regions[$i]->name }}">{{ $regions[$i]->name }}</option>
                        @endfor

                    </select>

                </div>
                <div class="col-md-6 mb-3 mt-3">


                    <select class="form-select" id="dis" required placeholder="Select a district..." name="district">
                        <option value="">Select District</option>
                    </select>

                </div>


                <button type="submit" class="btn btn-primary" value="Validate" onclick="Validate()">create deo</button>
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
