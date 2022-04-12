@extends('layouts.admin')
@section('content')
<?php
$requestdatas = (!empty(old())) ? old() : $detail;
// dd(old());
 ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Personal Details
                </h3>
            </div>
            <div>
                <a href="{{route('customers.personal_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
                <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
        <div class="m-content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-section">
                            <form method="post" action="{{ route('customers.personal_update',$detail['customer_id']) }}" class="validation_form" id="upload" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8 offset-md-2">
                                <div class="m-section__content">
                                    <div id="err"></div>
                                    <div class="form-group row">
                                        <label class="col-md-5">
                                            Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['name'] }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Father / Spouse Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['fathers_name'] }}" type="text" autocomplete="off" class="form-control" name="fathers_name" />
                                            @error('fathers_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Age <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['age'] }}" type="text" autocomplete="off" class="form-control" name="age" />
                                            @error('age')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Gender <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7 radio-sec">
                                                <label><input {!! ($requestdatas['gender'] == "Male") ? "checked" : "" !!} type="radio" class="" name="gender" value="Male"> <span> Male</span></label><br>
                                                <label><input {!! ($requestdatas['gender'] == "Female") ? "checked" : "" !!} type="radio" class="" name="gender" value="Inactive"> <span> Female</span></label><br>
                                            @error('gender')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Mobile Number <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['phone'] }}" type="text" autocomplete="off" class="form-control" name="phone" />
                                            @error('phone')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Email <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['email'] }}" type="text" autocomplete="off" class="form-control" name="email" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Occupation <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['occupation'] }}" type="text" autocomplete="off" class="form-control" name="occupation" />
                                            @error('occupation')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Total Years of Experience <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['experience'] }}" type="text" autocomplete="off" class="form-control" name="experience" />
                                            @error('experience')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Residential Address <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <textarea rows="4" class="form-control" name="address">{{ $requestdatas['address'] }}</textarea>
                                            @error('address')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Annual Income <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['income'] }}" type="text" autocomplete="off" class="form-control" name="income" />
                                            @error('income')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div>
                                     
                                    <div class="form-group text-right">
                                        <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
     .radio-sec input {
position: relative;
top: 0px;
margin-right: 5px;
margin-left: 0px;
}
</style>
@endsection
