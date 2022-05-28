@extends('layouts.admin_dashboard')
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Regions Registration</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage regions</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- =====manage subject======= -->
                    <div class="container">

                        <form>
                            <div class="form-group">
                                <label>Region Name:</label>
                                <input type="text" name="rname" class="form-control" placeholder="enter region name" required="">
                            </div>

                            <button type="submit" class="btn btn-success save-btn">Save</button>

                        </form>
                        <br/>
                        <table class="table table-bordered data-table">
                            <thead>
                            <th>Region Name</th>

                            <th width="200px">Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
