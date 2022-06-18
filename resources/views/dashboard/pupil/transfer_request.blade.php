@extends('layouts.pupil_dashboard')
@section('content')
    <main>
        <div class="container py-3 mt-3" >
            @if($requestStatus && $respondedStatus == null)
                <div class="container mt-5">
                    <div class="row">
                        <h2 style="text-align: center; color:green;">Your request is being processed.</h2>
                        <h2 style="text-align: center; color:green;">Please wait....!</h2>
                    </div>
                </div>

            @elseif($respondedStatus == 'approved')
                <div class="container">
                    <div class="card mb-4 bg-white border border-2" id="approved_form">
                        <div class="card-body ">
                            <div class="container ">
                                <div id="content text-center">
                                    <h1 class="" style="text-align:center;">THE UNITED REPLUC OF TANZANIA</h1>
                                    <h3 class="" style="text-align:center;padding:20px 0;">PRESIDENT'S OFFICE</h3>
                                    <h3 class="" style="text-align:center;padding-top:20px;">Ministry of Education and Vacation Training(MoEVT)</h3>
                                    <p> <img src="{{ asset('images/logo_moevt.jpg') }}" alt="" style="width:120px; margin-left:40%;padding:20px 0;">
                                    </p>
                                    <div class="container">
                                        <div class="row mt-4">
                                            <h1 class="text-center text-uppercase fs-3" style="padding-top:20px;">RE: <u>APPROVAL REQUEST FOR {{ $full_name }}</u></h1>
                                            <div class="container" style="padding-top: 10px;">
                                                <div class="row mt-4" style="">
                                                    <h5>Reference is made to your transfer letter requesting a chance to transfer to the above mentioned <br> pupil name who pursuing <strong>Standard {{ $class }}</strong> at <strong>{{ $SchoolFrom }}</strong></h5>
                                                </div>
                                                <div class="row mt-4">
                                                    <h5>I would like to inform your request of tranferring to <strong>{{ $destinationSchool }}l</strong> has been approved. </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-content" style="margin-left: 20px;">
                                            <div class="Section-below pt-50">
                                                <div class="card-body pt-50">
                                                    <div class="row">
                                                        <div class="col-md-3 mt-50">
                                                            <h6>Head Master Signature</h6>
                                                            <h5 class="text-start">_____________________</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="page"></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-end">
                    <button id="btn" class="btn btn-primary">Download Your Approved Form</button>
                </div>



            @elseif($respondedStatus == 'declined')
                <h1>
                    dear: {{ $full_name }} <br>
                    your request transfer to destination school has been Declined
                    due to: something something <br>
                </h1>

            @else
                <div class="container" style="margin-bottom: 80px; padding-right: 10px;">
                    <div class="card bg-body" >
                        <div class="card-body">
                            <div class="container">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-12">
                                        <!-- ======horizontal form==== -->
                                        <form class="row g-3 needs-validation" id="myForm" method="post" novalidate>
                                            @csrf
                                            <h3>Pupil personal details</h3>
                                            <div class="row">
                                                <div class="row">
                                                    <label for="validationCustom08" class="form-control-sm">Region name</label>
                                                    <select class="form-select" name="region" id="validationCustom08" required onchange="loadDistricts(this.value)">

                                                        <option selected value="">Select Region</option>
                                                        @foreach($destinationDetails as $destinationDetail)
                                                            <option name="{{ $destinationDetail -> name }}"  value="{{ $destinationDetail -> name }} @selected(old('region') == $destinationDetail)">{{ $destinationDetail -> name }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('region')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <label for="dis" class="form-label">District name</label>
                                                    <select class="form-select" name="district" id="dis" required onchange="loadSchool(this.value)">
                                                        <option selected value="">Select district</option>
                                                    </select>
                                                    @error('district')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <label for="validationCustom08"  class="form-label" class="form-control-sm">School</label>
                                                    <select class="form-select" name="school" id="school" required>
                                                        <option selected value="">Select school</option>
                                                    </select>

                                                    @error('school')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <label for="validationCustom10" class="form-label">Reason For
                                                        Transfer/Sababu za kuomba uhamisho</label><br>
                                                    <select class="form-select" name="reason" id="validationCustom08" required>
                                                        <option selected value="">Choose...</option>
                                                        <option name="reason" value="Medical Reason">Medical Reason</option>
                                                        <option name="reason" value="Kumfata mzazi">Kumtafata mzazi</option>
                                                        <option name="reason" value="Umbali mrefu kufika shule">Umbali mrefu kufika shuleni</option>
                                                        <option name="reason" value="Umbali mrefu kufika shule">Sababu zinginezo</option>
                                                    </select>
                                                    @error('reason')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">

                                                    <label for="">Other reason</label><br>
                                                    <textarea name="other_reason" id="" cols="30" rows="2"
                                                              class="form-control" placeholder="Sababu nyingine"
                                                              required>
                                                    </textarea>
                                                    @error('other_reason')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                    </div>

                                </div>
                            </div>
                            <div class="contaner" id="myMessage">
                                <p>Your request has been submitted successful!</p>
                            </div>
                            <div class="col-md-12 btn-request" style="padding-top: 20px; margin-left:12px;">
                                <button class="btn btn-outline-primary" type="submit">Submit request</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
        @endif
    </main>

    @endsection

<script>
    function  loadDistricts(region){

        let dis=$('#dis');
        $.ajax(({
            method:"GET",
            url:"dest_district",
            data:{data:region},
            success:function (res){
                let da=JSON.parse(res);
                dis.html("");
                dis.append(`<option value="">Select district</option>`);
                for(let i=0; i<da.length; i++){

                    dis.append(`
                     <option value="${da[i].district}" name="${da[i].district}"> ${da[i].district} </option>
                    `)

                }

            }
        }))
    }
    function  loadSchool (school){
        let dis=$('#school');
        $.ajax(({
            method:"GET",
            url:"dest_school",
            data:{data:school},
            success:function (res){
                let da=JSON.parse(res);
                console.log(da);
                dis.html("");
                dis.append(`<option value="">Select school</option>`);
                for(let i=0; i<da.length; i++){

                    dis.append(`
                     <option value="${da[i].school_name}" data="${da[i].status}" name="${da[i].school_name}"> ${da[i].school_name} --${da[i].status}

                        </option>
                    `)

                }
            }
        }))
    }

    $(document).on('click', '#btn', function() {

        let pdf = new jsPDF();
        let section = $('#approved_form');
        let page = function() {
            pdf.save('Approved.pdf');

        };
        pdf.addHTML(section, page);

    });

</script>


