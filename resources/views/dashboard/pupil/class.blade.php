@extends('layouts.pupil_dashboard')

<style>
    #btnExport {
        background-color: rgb(221, 30, 30);
        color: antiquewhite;
        border-radius: 12px;
        padding-top: 12px;
        padding-bottom: 12px;
        margin-left: 820px;
        margin-right: 28px;
    }
</style>
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pupil Continous Assessment</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('pupil_dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Continuous Assessment</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body" id="tblResults">
                        <p>Name: {{ $name }}</p>
                        <p>class:  {{ \Illuminate\Support\Facades\DB::table('students')->where('user_id',\Illuminate\Support\Facades\Auth::id())->value('_class')}}
                        </p>
                        <p>Year of study: 2022</p>
                        <h2>Terminal Continous Assessment</h2>


                        <div class="container">


                            <table class="table table-bordered mt-5">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Subject Name</th>
                                    <th>Marks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hisabati</td>
                                    <td>89</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kuandika</td>
                                    <td>89</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kusoma</td>
                                    <td>89</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- ========annual====== -->
                        <div class="container pt-10">
                            <h2>Annual-term Continous Assessment</h2>

                            <table class="table table-bordered mt-4">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Subject Name</th>
                                    <th>Marks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hisabati</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kuandika</td>
                                    <td>79</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kusoma</td>
                                    <td>89</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="button" id="btnExport" value="Download CA" />
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">

            </div>
        </footer>
    </div>


@endsection
