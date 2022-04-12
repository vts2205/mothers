@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    View Payment History
                </h3>
            </div>
            <div>
                <a href="{{route('payments.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back To List">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                      
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                           
                                           
                                            <th>Transaction Type</th>
                                            <th>Bank Type</th>
                                            <th>Bank Name</th>
                                            <th>Loan Sansaction Amount</th>
                                            <th>Payment Schedule</th>
                                            <th>Schedule Type</th>
                                            <th>Total Amount</th>
                                            <th>Received Amount</th>
                                            <th>Balance Amount</th>
                                            <th>Payment Date</th>
                                            <th>Transaction Type</th>
                                            <th>Payment Type</th>
                                            <th>Transaction Number</th>
                                            <th>Added By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $i = ($results->currentpage() - 1) * $results->perpage() + 1;
                                        foreach ($results as $result) {
                                            $customer = App\Customer::where('customer_id', $result['customer_id'])->first();
                                        ?>
                                       
                                            <tr>
                                                <td width="5%">{{ $i }}</td>
                                              
                                                <td>{{ $result->transaction_type }}</td>
                                                <td>{{ $result->bank_type }}</td>
                                                <td>{{ $result->bank_name }}</td>
                                                <td>
                                                <?php 
                                                if(!empty($result->loan_amount)) {
                                                    echo "Rs. " .$result->loan_amount;
                                                } else {
                                                    echo "- ";
                                                }
                                                    ?>
                                                </td>
                                                <td>{{ $result->payment_schedule }}{{" %"}}</td>

                                                <?php if($result->onbook_received10per != 0)  { ?>
                                                    <td>On Booking 10%</td>

                                                <?php } else  if($result->payments_received10per != 0) { ?>
                                                    <td>Payment for Agreements 40%</td>
                                                 <?php } else  if($result->first_received10per != 0) { ?>
                                                    <td>Completion of stilt + First Floor 10%</td>
                                                    <?php } else  if($result->second_received10per != 0) { ?>
                                                        <td>Completion of Second Floor 10%</td>
                                                        <?php } else  if($result->third_received10per != 0) { ?>
                                                            <td>Completion of Third Floor 10%</td>
                                                            <?php } else  if($result->fourth_received10per != 0) { ?>
                                                                <td>Completion of Fourth Floor 10%</td>
                                                                <?php } else  if($result->fifth_received10per != 0) { ?>
                                                                    <td>Completion of Fifth Floor 5%</td>
                                                                    <?php } else  if($result->handover_received10per != 0) { ?>
                                                                        <td>Handovering 5%</td>
                                                                        <?php } else if($result->onbook_received15per != 0)  { ?>
                                                    <td>On Booking 15%</td>
                                                <?php } else  if($result->payments_received15per != 0) { ?>
                                                    <td>Payment for Agreements 40%</td>
                                                 <?php } else  if($result->first_received15per != 0) { ?>
                                                    <td>Completion of stilt + First Floor 10%</td>
                                                    <?php } else  if($result->second_received15per != 0) { ?>
                                                        <td>Completion of Second Floor 10%</td>
                                                        <?php } else  if($result->third_received15per != 0) { ?>
                                                            <td>Completion of Third Floor 10%</td>
                                                            <?php } else  if($result->fourth_received15per != 0) { ?>
                                                                <td>Completion of Fourth Floor 5%</td>
                                                                <?php } else  if($result->fifth_received15per != 0) { ?>
                                                                    <td>Completion of Fifth Floor 5%</td>
                                                                    <?php } else  if($result->handover_received15per != 0) { ?>
                                                                        <td>Handovering 5%</td>
                                                                        <?php } else if($result->onbook_received20per != 0)  { ?>
                                                    <td>On Booking 20%</td>
                                                    <td>{{ $result->onbook20per }}</td>
                                                    <td>{{ $result->onbook_received20per }}</td>
                                                    <td>{{ $result->onbook_balance20per }}</td>
                                                    <td>{{ $result->onbook_paymentdate20per }}</td>
                                                    <td>{{ $result->onbook_transactiontype20per }}</td>
                                                    <td>{{ $result->onbook_paymenttype20per }}</td>
                                                    <?php if($result->onbook_paymenttype20per == "Cheque") { ?>
                                                        <td>{{ $result->onbook_chequenumber20per }}</td>
                                                        <?php } else if($result->onbook_paymenttype20per == "NEFT") { ?>
                                                            <td>{{ $result->onbook_neftid20per }}</td>
                                                            <?php } else if($result->onbook_paymenttype20per == "RTGS") { ?>
                                                                <td>{{ $result->onbook_rtgsid20per }}</td>
                                                                <?php } else if($result->onbook_paymenttype20per == "Cash") { ?>
                                                                    <td><?php echo "-";?></td>
                                                                    <?php } ?>
                                                   
                                                <?php } else  if($result->payments_received20per != 0) { ?>
                                                    <td>Payment for Agreements 40%</td>
                                                    <td>{{ $result->payments20per }}</td>
                                                    <td>{{ $result->payments_received20per }}</td>
                                                    <td>{{ $result->payments_balance20per }}</td>
                                                    <td>{{ $result->payments_paymentdate20per }}</td>
                                                    <td>{{ $result->payments_transactiontype20per }}</td>
                                                    <td>{{ $result->payments_paymenttype20per }}</td>
                                                    <?php if($result->payments_paymenttype20per == "Cheque") { ?>
                                                        <td>{{ $result->payments_chequenumber20per }}</td>
                                                        <?php } else if($result->payments_paymenttype20per == "NEFT") { ?>
                                                            <td>{{ $result->payments_neftid20per }}</td>
                                                            <?php } else if($result->payments_paymenttype20per == "RTGS") { ?>
                                                                <td>{{ $result->payments_rtgsid20per }}</td>
                                                                <?php } else if($result->payments_paymenttype20per == "Cash") { ?>
                                                                    <td><?php echo "-";?></td>
                                                                    <?php } ?>

                                                 <?php } else  if($result->first_received20per != 0) { ?>
                                                    <td>Completion of stilt + First Floor 10%</td>
                                                    <td>{{ $result->first20per }}</td>
                                                    <td>{{ $result->first_received20per }}</td>
                                                    <td>{{ $result->first_balance20per }}</td>
                                                    <td>{{ $result->first_paymentdate20per }}</td>
                                                    <td>{{ $result->first_transactiontype20per }}</td>
                                                    <td>{{ $result->first_paymenttype20per }}</td>
                                                    <?php if($result->first_paymenttype20per == "Cheque") { ?>
                                                        <td>{{ $result->first_chequenumber20per }}</td>
                                                        <?php } else if($result->first_paymenttype20per == "NEFT") { ?>
                                                            <td>{{ $result->first_neftid20per }}</td>
                                                            <?php } else if($result->first_paymenttype20per == "RTGS") { ?>
                                                                <td>{{ $result->first_rtgsid20per }}</td>
                                                                <?php } else if($result->first_paymenttype20per == "Cash") { ?>
                                                                    <td><?php echo "-";?></td>
                                                                    <?php } ?>

                                                    <?php } else  if($result->second_received20per != 0) { ?>
                                                        <td>Completion of Second Floor 10%</td>
                                                        <td>{{ $result->second20per }}</td>
                                                    <td>{{ $result->second_received20per }}</td>
                                                    <td>{{ $result->second_balance20per }}</td>
                                                    <td>{{ $result->second_paymentdate20per }}</td>
                                                    <td>{{ $result->second_transactiontype20per }}</td>
                                                    <td>{{ $result->second_paymenttype20per }}</td>
                                                    <?php if($result->second_paymenttype20per == "Cheque") { ?>
                                                        <td>{{ $result->second_chequenumber20per }}</td>
                                                        <?php } else if($result->second_paymenttype20per == "NEFT") { ?>
                                                            <td>{{ $result->second_neftid20per }}</td>
                                                            <?php } else if($result->second_paymenttype20per == "RTGS") { ?>
                                                                <td>{{ $result->second_rtgsid20per }}</td>
                                                                <?php } else if($result->second_paymenttype20per == "Cash") { ?>
                                                                    <td><?php echo "-";?></td>
                                                                    <?php } ?>

                                                        <?php } else  if($result->third_received20per != 0) { ?>
                                                            <td>Completion of Third Floor 5%</td>
                                                            <td>{{ $result->third20per }}</td>
                                                    <td>{{ $result->third_received20per }}</td>
                                                    <td>{{ $result->third_balance20per }}</td>
                                                    <td>{{ $result->third_paymentdate20per }}</td>
                                                    <td>{{ $result->third_transactiontype20per }}</td>
                                                    <td>{{ $result->third_paymenttype20per }}</td>
                                                    <?php if($result->third_paymenttype20per == "Cheque") { ?>
                                                        <td>{{ $result->third_chequenumber20per }}</td>
                                                        <?php } else if($result->third_paymenttype20per == "NEFT") { ?>
                                                            <td>{{ $result->third_neftid20per }}</td>
                                                            <?php } else if($result->third_paymenttype20per == "RTGS") { ?>
                                                                <td>{{ $result->third_rtgsid20per }}</td>
                                                                <?php } else if($result->third_paymenttype20per == "Cash") { ?>
                                                                    <td><?php echo "-";?></td>
                                                                    <?php } ?>

                                                            <?php } else  if($result->fourth_received20per != 0) { ?>
                                                                <td>Completion of Fourth Floor 5%</td>
                                                                <?php } else  if($result->fifth_received20per != 0) { ?>
                                                                    <td>Completion of Fifth Floor 5%</td>
                                                                    <?php } else  if($result->handover_received20per != 0) { ?>
                                                                        <td>Handovering 5%</td>
                                                                        <?php } ?>


                                                      
                                               
                                      
                                               

                                                <td>{{ $result->addedby }}</td>
                                               
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        
                                                      
                                                       
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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection