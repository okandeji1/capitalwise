@extends('layouts.admin.master')

@section('title')Advance init
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
		@endslot

	@endcomponent

	<div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header pb-0">
                <h5>Savings History</h5>
                <div class="box-header with-border">
                  <br>
                  <h6 class="box-title">Current Savings Balance:N105,000.00</h6>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display" id="advance-1">
                    <thead>
                      <tr class="text-dark">
                        <th>Date</th>
                        <th>Amount(N)</th>
                        <th>Savings Category</th>
                        <th>Payment Method</th>
                        <th>Verified by</th>
                        <th>Payment type</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022/03/24</td>
                        <td class="text-dark">20,000</td>
                        <option>Capwise Savings Invest</option>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                      <tr>
                        <td>2022/02/27</td>
                        <td class="text-dark">34,000</td>
                        <option>Capwise Savings Invest</option>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:red;">Pending</td>
                      </tr>
                      <tr>
                        <td>2022/02/26</td>
                        <td class="text-dark">20,000</td>
                        <option>Capwise Target Savings</option>

                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Withdrawal</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                      <tr>
                        <td>2022/03/25</td>
                        <td class="text-dark">18,000</td>
                        <option>Capwise Savings Invest</option>
                        <td>Credit Card</td>
                        <td>Ade Thomas</td>
                        <td>Deposit</td>
                        <td style="color:green;">Successful</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


            </div>
          </div>
        </div>
    </div>

	@push('scripts')
	<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
	@endpush

@endsection
