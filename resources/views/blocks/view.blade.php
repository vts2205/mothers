@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Customer Info
                </h3>
            </div>
            <div>
                <a href="{{route('blocks.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content application">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <?php
                        $data['document'] = App\Document::where('customer_id', $detail->customer_id)->where('status', 'Active')->get();
                        $data['cost'] = App\Cost::where('customer_id', $detail->customer_id)->where('status', 'Active')->get();
                        $data['receipt'] = App\Receipt::where('customer_id', $detail->customer_id)->where('status', 'Active')->get();
                        $data['payment'] = App\Payment::where('customer_id', $detail->customer_id)->where('status', 'Active')->get();
                        ?>
                        <div class="accordion">
                            <h4 class="accordion-toggle">Personal Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            NAME OF THE APPLICANT
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->applicant_name  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            APPLICATION NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->application_number  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            DATE OF APPLICATION
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->date_of_application  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            FATHER/SPOUSE NAME
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->fathers_name  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            AGE
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->age  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            GENDER
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->gender  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            MOBILE NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <span>
                                                <?php
                                                echo $detail['phone_code'] . ' ';
                                                ?></span>
                                            <?php echo $detail['phone']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ALTERNATIVE MOBILE NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <span>
                                                <?php
                                                echo $detail['altphone_code'] . ' ';
                                                ?></span>
                                            <?php echo $detail['altphone']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            EMAIL
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->email  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            OCCUPATION
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->occupation) ? $detail->occupation : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            TOTAL YEARS OF EXPERIENCE
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->experience) ? $detail->experience : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            RESIDENTIAL/ PERMANENT ADDRESS
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->permanent_address) ? $detail->permanent_address : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            CORRESPONDANCE/ PRESENT ADDRESS
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->present_address) ? $detail->present_address : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ANNUAL INCOME
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->income) ? $detail->income : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            PHOTO
                                        </label>
                                        <div class="col-md-8">
                                            <img width="100" height="100" src="<?php echo  asset('files/customers/' . $detail->photo) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="accordion-toggle">Document Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php foreach ($data['document'] as $doc) { ?>
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT NAME
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->co_applicant_name) ? $doc->co_applicant_name : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT MAIL ID
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->coapp_email) ? $doc->coapp_email : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT ADDRESS
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->coapp_address) ? $doc->coapp_address : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT MOBILE NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <span>
                                                    <?php
                                                    echo $doc['coapp_phone_code'] . ' ';
                                                    ?></span>
                                                <?php echo $doc['coapp_phone']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT AADHAR NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->aadhar_number) ? $doc->aadhar_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT PAN NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->pan_number) ? $doc->pan_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT PASSPORT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->passport_number) ? $doc->passport_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT AADHAR NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->coaadhar_number) ? $doc->coaadhar_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT PAN NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->copan_number) ? $doc->copan_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT PASSPORT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo !empty($doc->copassport_number) ? $doc->copassport_number : "-" ?>
                                            </div>
                                        </div>
                                        <?php
                                        $phase = App\Phase::where('phase_id', $doc['phase'])->first();
                                        $block = App\Block::where('block_id', $doc['block'])->first();
                                        $floor = App\Floor::where('floor_id', $doc['floor'])->first();
                                        $flattype = App\Flattype::where('flattype_id', $doc['flattype'])->first();
                                        $flatnumber = App\Flatnumber::where('flatnumber_id', $doc['flatnumber'])->first();
                                        ?>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                PHASE
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $phase->phase_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                BLOCK
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $block->block_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLOOR
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $floor->floor_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT TYPE
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $flattype->flattype  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $flatnumber->flatnumber  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT FACING
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $doc->facing  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                SALEABLE AREA
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $doc->salable_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                PLINTH AREA
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $doc->plinth_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                UDS AREA
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $doc->uds_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                COMN AREA
                                            </label>
                                            <div class="col-md-8">
                                                <?php echo $doc->comn_area  ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }  ?>
                            </div>

                            <h4 class="accordion-toggle">Cost Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php foreach ($data['cost'] as $cos) {
                                ?>
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                RATE PER SQFT
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->rate_sqft  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                SALABLE VALUE
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->salable_value  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                GUIDELINE VALUE
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->guideline_value  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                LAND COST
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->land_cost  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CONSTRUCTION COST
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->construction_cost  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                ELECTRICTY CHARGES
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->electricity_charges  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                METRO WATER SUPPLY
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->water_supply  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CAR PARK
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->car_park  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                AMENITIES CHARGES
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->amenities_charges  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                MAINTENANCE CHARGES
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->maintenance  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                GROSS AMOUNT
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->gross_amount  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                STAMP DUTY CHARGES
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->stamp  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                REGISTRATION CHARGES
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->registration  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                REGISTRATION CHARGES FOR CONSTRUCTION AGREEMENT
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->construction  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CORPUS FUND
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->corpus_fund  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                GST
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->gst  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                TOTAL AMOUNT
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo 'Rs.' .$cos->total_amount  ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <!-- <h4 class="accordion-toggle">Payment Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                          
                                <div class="table-responsive">
                                    <table class="table m-table m-table--head-bg-brand">
                                        <thead>
                                            <tr>
                                                <th>Payment Schedule</th>
                                                <th>Total Amount</th>
                                                <th>Received Amount</th>
                                                <th>Balance Amount</th>
                                                <th>Payment Date</th>
                                                <th>Transaction Type</th>
                                                <th>Payment Type</th>
                                                <th>Cheque Number</th>
                                                <th>NEFT ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['payment'] as $pay) {  ?>
                                                <tr>
                                                    <td><?php echo $pay->payment_schedule  ?></td>
                                                    <td><?php echo $pay->onbook10per  ?></td>
                                                    <td><?php echo 'Rs.' . $pay->onbook_received10per  ?></td>
                                                    <td><?php echo $pay->onbook_balance10per ?></td>
                                                    <td><?php echo !empty($pay->dated) ? $pay->dated : "-" ?></td>
                                                    <td><?php echo !empty($pay->drawn_on) ? $pay->drawn_on : "-" ?></td>
                                                    <td><?php echo !empty($pay->bank_towards) ? $pay->bank_towards : "-" ?></td>
                                                    <td><?php echo !empty($pay->referred_by) ? $pay->referred_by : "-" ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                              
                               
                                
                            </div> -->
                            <h4 class="accordion-toggle">Receipt Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                            <?php if ($data['receipt']->count() > '0') {
                        ?>
                                <div class="table-responsive">
                                    <table class="table m-table m-table--head-bg-brand">
                                        <thead>
                                            <tr>
                                                <th>Receipt No</th>
                                                <th>Receipt Date</th>
                                                <th>Receipt Amount</th>
                                                <th>Cheque/DD No</th>
                                                <th>Cheque Date</th>
                                                <th>Drawn On</th>
                                                <th>Bank Towards</th>
                                                <th>Referred By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['receipt'] as $rec) {  
                                                 
                                                ?>
                                                <tr>
                                                    <td><?php echo $rec->receipt_no  ?></td>
                                                    <td><?php echo $rec->receipt_date  ?></td>
                                                    <td><?php echo 'Rs.' . $rec->final_amount  ?></td>
                                                    <td><?php echo !empty($rec->cheque_no) ? $rec->cheque_no : "-" ?></td>
                                                    <td><?php echo !empty($rec->dated) ? $rec->dated : "-" ?></td>
                                                    <td><?php echo !empty($rec->drawn_on) ? $rec->drawn_on : "-" ?></td>
                                                    <td><?php echo !empty($rec->bank_towards) ? $rec->bank_towards : "-" ?></td>
                                                    <td><?php echo !empty($rec->referred_by) ? $rec->referred_by : "-" ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } else { ?>
                            <div class="text-center">
                                <img src="{{ asset('admin/img/no-record.png') }}">
                            </div>
                        <?php } ?>
                            </div>
                        </div>
                        <!-- <div class="download_pdf">
                            <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Download Invoice" href="" target="_blank" download>
                                Download PDF<i style="color: white;font-size: 18px !important;" class="fa fa-download"></i>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        .application a.btn.btn-secondary.m-btn.m-btn--air.m-btn--custom {
            padding: 17px;
            background: #0054ac;
            color: white;
            border-radius: 0px;
        }

        .download_pdf {
            margin-top: 24px;
            text-align: right;
        }

        .application i.fa.fa-comments {
            color: white !important;
            padding: 0px 10px;
        }

        .application label.alert-danger {
            padding: 0px 6px;
            background: red;
        }

        .application a#pills-apllicaton-tab,
        a#pills-online_apllicaton-tab {
            background: white !important;
            color: #0054ac;
            padding: 15px 26px 15px 12px;
            font-size: larger;
            border-radius: 0px;
        }

        .application a#pills-apllicaton-tab.active,
        a#pills-online_apllicaton-tab.active {
            border-bottom: 3px solid;
        }

        .application .nav.nav-pills .nav-item,
        .nav.nav-tabs .nav-item {
            margin-left: 2px;
            margin-bottom: 0px;
        }

        .application ul#pills-tab {
            margin-left: 15px;
            margin-bottom: 0px !important;
        }

        .application a.download {
            border: 2px solid #f72a80;
            border-radius: 4px;
            font-size: 15px;
            background: #f72a80;
            color: white;
            padding: 2px;
            margin: 2px;
        }

        .application a.view {
            border: 2px solid green;
            border-radius: 4px;
            font-size: 15px;
            background: green;
            color: white;
            padding: 2px;
            margin: 2px;
        }

        .application .view:hover {
            text-decoration: none !important;
        }

        .application .download:hover {
            text-decoration: none !important;
        }

        .application a .fa.fa-download,
        a .fa.fa-eye {
            font-size: 21px !important;
        }

        .accordion h4 {
            font-size: 16px;
        }

        .accordion-toggle {
            border-bottom: 1px solid #cccccc;
            cursor: pointer;
            margin: 0;
            padding: 10px 0;
            position: relative;
        }

        .accordion-toggle.active:after {
            content: "";
            position: absolute;
            right: 0;
            top: 17px;
            width: 0;
            height: 0;
            border-bottom: 5px solid #f00;
            border-left: 5px solid rgba(0, 0, 0, 0);
            border-right: 5px solid rgba(0, 0, 0, 0);
        }

        .accordion-toggle:before {
            content: "";
            position: absolute;
            right: 0;
            top: 17px;
            width: 0;
            height: 0;
            border-top: 5px solid #000;
            border-left: 5px solid rgba(0, 0, 0, 0);
            border-right: 5px solid rgba(0, 0, 0, 0);
        }

        .accordion-toggle.active:before {
            display: none;
        }

        .accordion-content {
            display: none;
        }

        .accordion-toggle.active {
            color: #0054ac;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.accordion').find('.accordion-toggle').click(function() {
                $(this).next().slideToggle('600');
                $(".accordion-content").not($(this).next()).slideUp('600');
            });
            $('.accordion-toggle').on('click', function() {
                $(this).toggleClass('active').siblings().removeClass('active');
            });
        });
    </script>
    @endsection