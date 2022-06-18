@extends('layouts.head_teacher_dashboard')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row mt-3 py-3" style="margin-left:150px; ">
        <div class="col-md-6 mt-3 py-3">
            <form action="head_teacher_reset" method="post" >
                @csrf
                <!-- old password input -->
                <div class="row mb-4" style="margin-left:5px;">
                    <input type="password" name="current_password" id="old_password" class="form-control-sm" placeholder="Current password" class="form-control"/>
                    @error('current_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <!-- new password input -->
                <div class="row mb-4" style="margin-left:5px;">
                    <input type="password" name="new_password" id="password" class="form-control-sm" placeholder="New password" class="form-control"/>
                    @error('new_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- confirm password input -->
                <div class="row mb-4" style="margin-left:5px;">
                    <input type="password" name="new_confirm_password" id="password" class="form-control-sm" placeholder="Confirm password" class="form-control"/>
                    @error('new_confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary">Change</button>
            </form>
        </div>
    </div>

@endsection
