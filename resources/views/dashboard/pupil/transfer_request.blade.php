<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard - PTCAIS Parent / Pupil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>

    <link href="{{ asset('css/pupil/styles.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/pupil/transfer_form.css') }}" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('pupil_dashboard') }}">PTCAIS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="{{ url('auth') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ url('pupil_dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>


                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Academics / CA
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('pupil_class') }}">
                                Standard  {{ \Illuminate\Support\Facades\DB::table('students')->where('user_id',\Illuminate\Support\Facades\Auth::id())->value('_class')}}
                            </a>
                        </nav>
                    </div>

                    <!-- ============ transfer request/=========== -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Transfer Requests
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('pupil_transfer') }}">Transfer request</a>
{{--                            <a class="nav-link" href="{{ url('transfer_status') }}">Transfer status</a>--}}

                        </nav>
                    </div>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                pupil
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid px-4">
                <!-- <h1 class="mt-4">Transfer Request</h1> -->
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('pupil_dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transfer Form</li>
                </ol>

                @if($requestStatus && $respondedStatus == null)

                    {{--student already request--}}

                    <div class="container mt-5">
                        <div class="row">
                            <h2 style="text-align: center; color:green;">Your request is being processed.</h2>
                            <h2 style="text-align: center; color:green;">Please wait....!</h2>
                        </div>
                    </div>

                @elseif($respondedStatus == 'approved')
                    <h1>
                        <main>
                            <div class="container-fluid px-4">

{{--                                <ol class="breadcrumb mb-4 ">--}}
{{--                                    <li class="breadcrumb-item "><a href="#">Dashboard</a></li>--}}
{{--                                    <li class="breadcrumb-item active ">Transfer approved form</li>--}}
{{--                                </ol>--}}
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
                                                                <h5>Reference is made to your transfer letter requesting a chance to transfer to the above mentioned <br> pupil name who pursuing <strong>Standard One</strong> at <strong>{{ $SchoolFrom }}</strong></h5>

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
                                            <div id="page"></div>

                                        </div>



                                    </div>

                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                <button id="btn" class="btn btn-primary">Download Your Approved Form</button>
                            </div>
                            </div>
                        </main>
                    </h1>

                @elseif($respondedStatus == 'declined')
                    <h1>
                        dear: {{ $full_name }} <br>
                        your request transfer to destination school has been Declined
                        due to: something something <br>
                    </h1>

                @else

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="row">
                                        <!-- ======horizontal form==== -->
                                        <form class="row g-3 needs-validation" id="myForm" method="post" novalidate>
                                            @csrf
                                            <h3>Pupil personal details</h3>
                                            <div class="row">
                                                <div class="row">
                                                    <label for="validationCustom08" class="form-label">Region name</label>
                                                    <select class="form-select" name="region" id="validationCustom08" required>

                                                        <option selected value="">------- Select Region -------</option>
                                                        @foreach($destinationDetails as $destinationDetail)
                                                            <option name="{{ $destinationDetail -> name }}"  value="{{ $destinationDetail -> name }} @selected(old('region') == $destinationDetail)">{{ $destinationDetail -> name }}</option>
                                                        @endforeach

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select region.
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="validationCustom08" class="form-label">District name</label>
                                                    <select class="form-select" name="district" id="col" required>
                                                        <option selected value="">------- Select district -------</option>
                                                        <option name="dname" value="Chamwino">Chamwino</option>
                                                        <option name="dname" value="Chalinze">Chalinze</option>
                                                        <option name="dname" value="Dumila"> Dumila</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select school.
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="validationCustom08"  class="form-label">School</label>
                                                    <select class="form-select" name="school" id="validationCustom08" required>
                                                        <option selected value="">------- Select school -------</option>
                                                        <option name="pname" value="Dodoma Primary School">Dodoma Primary School</option>
                                                        <option name="pname" value="Makulu Primary School">Makulu P/s</option>
                                                        <option name="pname" value="Chalinze Primary School">Chalinze P/s</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select school.
                                                    </div>
                                                </div>



                                                <div class="row">

                                                    <label for="validationCustom10" class="form-label">Reason For
                                                        Transfer/Sababu za kuomba uhamisho</label><br>
                                                    <select class="form-select" name="reason" id="validationCustom08" required>
                                                        <option selected value="">Choose...</option>
                                                        <option name="reason" value="Medical Reason">Medical Reason</option>
                                                        <option name="reason" value="Kumfata mzazi">Kumtafata mzazi</option>
                                                        <option name="reason" value="Umbali mrefu kufika shule">Umbali mrefu
                                                            kufika shule
                                                        </option>

                                                    </select>

                                                    <div class="invalid-feedback" name="other_reason">
                                                        Please select reason.
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <label for="">Other reason</label><br>
                                                    <textarea name="other_reason" id="" cols="30" rows="5"
                                                              class="form-control" placeholder="Sababu nyingine"
                                                              required></textarea>

                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contaner" id="myMessage">
                            <p>Your request has been submitted successful!</p>
                        </div>

                        <div class="col-md-12 btn-request" style="padding-top: 20px; margin-left:-12px;">
                            <button class="btn btn-primary" type="submit">Submit request</button>
                        </div>
                        </form>

                    </div>
                @endif



            </div>
    </div>

</div>
</div>

</main>
</div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('js/pupil/scripts.js') }}"></script>
<script src="{{ asset('js/pupil/transfer_form.js') }}"></script>
<!-- for pdf library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js "></script>

<script>
    $(document).on('click', '#btn', function() {

        let pdf = new jsPDF();
        let section = $('#approved_form');
        let page = function() {
            pdf.save('Approved.pdf');

        };
        pdf.addHTML(section, page);

    });
</script>


</body>

</html>

