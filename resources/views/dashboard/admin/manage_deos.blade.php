@extends('layouts.admin_dashboard')
<link href="{{ asset('css/deo/view_cards.css') }}" rel="stylesheet"/>
@section('content')

    <main>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>Deos <b>Details</b></h2>
                            </div>

                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info "><i class="fa fa-plus"></i> Add New</button>
                            </div>

                            <div class="col-sm-4">
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" id="search" class="form-control" placeholder="Search by Deo name">
                                        <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Deo Name</th>
                            <th>District Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($deoDetails as $deoDetail)


                            <tr>
                                <td>{{ $deoDetail['name'] }}</td>
                                <td>{{ $deoDetail['district'] }}</td>
                                <td>Moro sec</td>

                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


@endsection
