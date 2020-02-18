@extends('layouts.app')
@section('title','Admin Dashboard')
@section('page-name', 'Add Employee')

@section('main-content')
{!! Form::open(['action'=>'AdminController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 ">
        <div class="card mb-4 p-3">
            <div class="card-header py-3" data-toggle="collapse" data-target="#employeeDetails">
                <h6 class="m-0 font-weight-bold">Employee Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="employeeDetails">
                    <div class="form-group">
                        {{Form::label('employeeName','Employee Name')}}
                        {{Form::text('employeeName','',['class'=>'form-control'])}}
                    </div>
                    <div class=" form-group">
                        {{Form::label('dateOfBirth','Date of Birth*')}}
                        {{Form::date('dateOfBirth',\Carbon\Carbon::now(), ['class'=>'form-control'] )}}
                    </div>
                    <div class="form-group">
                        {{Form::label('gender','Gender')}}
                        {{Form::select('gender',['male' => 'Male', 'female' => 'Female'], null ,['class'=>'form-control','placeholder' => 'Gender'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('phone-number','Phone Number')}}
                        {{Form::tel('phone-number','',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('nationality','Nationality')}}
                        {{Form::text('nationality','',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address','Local Address')}}
                        {{Form::textarea('address','',['class'=>'form-control', 'rows'=>'3'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('maritalStatus','Marital Status')}}
                        {{Form::select('maritalStatus',['S' => 'Single', 'M' => 'Married'], null ,['class'=>'form-control','placeholder' => 'Pick a status..'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('user_photo','Employee Photo')}}
                        {{Form::file('user_photo'), ['class'=>'form-control']}}
                        @error('user_photo')
                           <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>
            <!--Account Login Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#loginDetails">
                <h6 class="m-0 font-weight-bold">Account Login</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="loginDetails">
                    <div class="form-group">
                        {{Form::label('email','E-mail')}}
                        {{Form::email('email','',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password','Password')}}
                        {{Form::password('password',['class'=>'form-control'] )}}
                    </div>
                    <div class="form-group">
                        {{Form::label('confirm_password','Confirm Password')}}
                        {{Form::password('confirm_password',['class'=>'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="col-lg-6">
        <div class="card mb-4 p-3">
            <!--Compnay Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#companyDetails">
                <h6 class="m-0 font-weight-bold">Company Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="companyDetails">
                    <div class="form-group">
                        {{Form::label('id','Employee ID')}}
                        {{Form::text('id','Auto Generated',['class'=>'form-control','readonly'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('role','Employee Role')}}
                        {{Form::select('role',['employee' => 'Employee', 'admin' => 'Admin'], 'employee' ,['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('department','Department')}}
                        {{Form::select('department',['technical' => 'Technical', 'marketting' => 'Marketting','sales' => 'Sales', 'HR' => 'Human Resource'], null ,['class'=>'form-control','placeholder' => 'Select employee department..'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('designation','Designation')}}
                        {{Form::select('designation',['technical' => 'Technical', 'marketting' => 'Marketting','sales' => 'Sales', 'HR' => 'Human Resource'], null ,['class'=>'form-control','placeholder' => 'Select employee department first..'])}}
                    </div>
                    <div class=" form-group">
                        {{Form::label('resumptionDate','Resumption Date')}}
                        {{Form::date('resumptionDate',\Carbon\Carbon::now(), ['class'=>'form-control'] )}}
                    </div>
                    <div class="form-group">
                        {{Form::label('employeeStatus','Employee Status')}}
                        {{Form::select('employeeStatus',['active' => 'Active', 'inactive' => 'Inactive'], 'inactive' ,['class'=>'form-control'])}}
                    </div>
                </div>
            </div>

            <!--Finantial Details Section -->
            <div class="card-header py-3" data-toggle="collapse" data-target="#financialDetails">
                <h6 class="m-0 font-weight-bold">Financial Details</h6>
            </div>
            <div class="card-body">
                <div class="collapse" id="financialDetails">

                    <div class="form-group">
                        {{Form::label('basicSalary','Basic Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('basicSalary','1000' ,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-auto">
                                {{Form::select('deductionType',['tax' => 'Monthly Tax Deduction','pension' => 'Monthly Pension Deduction'], null ,['class'=>'form-control','placeholder'=>'Choose type of deduction'])}}
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    {{Form::number('deductionUnit','200',['class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-secondary"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('totalSalary','Total Salary')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₦</span>
                            </div>
                            {{Form::number('totalSalary','' ,['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
                <!-- Bank Account Details--->
                <div class="card-header py-3" data-toggle="collapse" data-target="#bankDetails">
                    <h6 class="m-0 font-weight-bold">Bank Account Details</h6>
                </div>
                <div class="card-body">
                    <div class="collapse" id="bankDetails">
                        <div class="form-group">
                            {{Form::label('accountName','Account Name')}}
                            {{Form::text('accountName','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('accountNumber','Account Number')}}
                            {{Form::text('accountNumber','',['class'=>'form-control'] )}}
                        </div>
                        <div class="form-group">
                            {{Form::label('bankName','Bank Name')}}
                            {{Form::text('banName','',['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="card-body">
        {{Form::submit('Register Employee',['class'=>'btn btn-primary btn-lg btn-block mt-3'])}}
    </div>
</div>
{!! Form::close() !!}
@endsection
