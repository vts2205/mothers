@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Payment Details List
                </h3>
            </div>
            <div>
                <!-- <a href="{{route('payments.add')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add Payment Details">
                    <i class="la la-plus"></i>
                </a> -->
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section__content    ">
                    <form method="GET" class="search-form form-inline " action="#">
                        <div class="form-group">
                            <select class="form-control" name="application_number">
                                @php
                                $customers = App\Customer::where('status','Active')->orderby('application_number','asc')->get();
                                @endphp
                                <option value="">Select Application Number</option>
                                @foreach($customers as $customer)
                                <option @if(isset($_REQUEST['application_number']) && $_REQUEST['application_number']==$customer['application_number']) selected @endif value="{{ $customer['application_number'] }}">{{ $customer['application_number'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">    
                            <select class="form-control" name="applicant_name">
                                @php
                                $customers = App\Customer::where('status','Active')->orderby('applicant_name','asc')->get();
                                @endphp
                                <option value="">Select Applicant Name</option>
                                @foreach($customers as $customer)
                                <option @if(isset($_REQUEST['applicant_name']) && $_REQUEST['applicant_name']==$customer['applicant_name']) selected @endif value="{{ $customer['applicant_name'] }}">{{ $customer['applicant_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="bank_type">
                            <option value="">--Select--</option>
                                                    <option value="SBI">SBI</option>
                                                    <option value="HDFC">HDFC</option>
                                                    <option value="IOB">IOB</option>
                                                    <option value="LIC">LIC</option>
                                                    <option value="CANARA">CANARA</option>
                                                    <option value="OTHERS">OTHERS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <?php if (isset($_REQUEST['search'])) { ?>
                                <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('deletes.payment_index')}}"><i class="fa fa-times"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <?php if ($results->count() > '0') {
                        ?>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Profile</th>
                                            <th>Application Number</th>
                                            <th>Applicant Name</th>
                                            <th>Application Date</th>
                                            <th>Gross Amount</th>
                                            <th>Payment Schedule</th>
                                            <th>Added By</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $i = ($results->currentpage() - 1) * $results->perpage() + 1;
                                        foreach ($results as $result) {
                                            $customer = App\Customer::where('customer_id', $result['customer_id'])->first();
                                        ?>
                                        <?php
                                                        if ($result->addmore == 1) {
                                                            $addrow = "hide";
                                                        } else {
                                                            $addrow = "";
                                                        }
                                                        ?>
                                       
                                            <tr class="<?php echo $addrow ; ?>">
                                                <td width="5%">{{ $i }}</td>
                                                <td class="text-center">
                                                    @if(!empty($customer['photo']))
                                                    <a href="{{URL::to('/files/customers/'.$customer['photo'].'')}}" target="_blank"><img src="{{URL::to('/files/customers/'.$customer['photo'].'')}}" width="50" height="50" style="border-radius: 50%;object-fit: cover;" />
                                                    </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $result->application_number }}</td>
                                                <td>{{ $result->applicant_name }}</td>
                                                <td>{{ $result->date_of_application }}</td>
                                                <td>{{"Rs. "}}{{ $result->gross_amount }}</td>
                                                <td class="text-center">{{ $result->payment_schedule }}{{" %"}}</td>
                                            
                                                <td>{{ $result->addedby }}</td>
                                               
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        
                                                     
                                                      
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="View" href="{{ route("deletes.payment_view", $result->customer_id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                      
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            {!! $results->appends(\Request::except('page'))->render() !!}
                            <!--@include('pagination.default', ['paginator' => $results])-->
                        <?php } else { ?>
                            <div class="text-center">
                                <img src="{{ asset('admin/img/no-record.png') }}">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection