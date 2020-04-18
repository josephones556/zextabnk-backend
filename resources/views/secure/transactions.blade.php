@extends('secure.layouts.app')

@section('content')

				<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<div class="page-icon">
										<i class="icon-watch_later"></i>
									</div>
									<div class="page-title">
										<h5>Manage Transactions</h5>
										<h6 class="sub-heading"><strong>{{ \Auth::user()->account->firstname }} {{ \Auth::user()->account->middlename }} {{ \Auth::user()->account->lastname }} </strong></h6>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									@include('secure.layouts.update')
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">

						<!-- Row start -->
						<div class="row gutters">
							@include('secure.layouts.notification')

							<div class="col-12 mb-3">
								<button onclick="printDiv('StatementPrint')" class="btn btn-primary float-right">Print Statement </button>
								<a href="{{ route('secure.transfer') }}" class="btn btn-primary float-left">Make Transfer </a>
							</div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" id="StatementPrint">
								<div class="card">
								    <div class="card-header">Recent Transactions</div>
								    <div class="card-body">
								        <table class="table table-striped table-bordered">
								            <thead>
								                <tr>
								                    <th>Type</th>
								                    <th>Reference</th>
								                    <th>Name</th>
								                    <th>Amount ($)</th>
								                    <th>Bank Name</th>
								                    <th>Date</th>
								                    <th>#Ref</th>
								                </tr>
								            </thead>
								            <tbody>
								            	@forelse($transactions as $transaction)
									                <tr>
									                    <td class="{{ $transaction->type == 'Debit' ? 'text-danger' : 'text-success' }}">{{ $transaction->type }}</td>
									                    <td>{{ $transaction->reference }}</td>
									                    <td>{{ $transaction->account_name }}</td>
									                    <td>{{ number_format($transaction->amount, 2) }} </td>
									                    <td>{{ $transaction->bank_name }}</td>
									                    <td>{{ $transaction->date->format('d M, Y') }}</td>
									                    <td><a href="{{ route('secure.invoice', ['reference' => $transaction->reference ])}}" class="text-primary">Details</a></td>
									                </tr>
													@empty
									            @endforelse
								            </tbody>
								        </table>
								        {{ $transactions->links() }}
								    </div>
								</div>
							</div>
						</div>

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
@endsection('content')

@push('js')
<script src="/secure/js/jquery.basictable.min.js"></script>
<script type="text/javascript">
	function printDiv(divName){
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
    $(document).ready(function() {
    	$('.table').basictable({
		    breakpoint: 768,
		});
    });
</script>
@endpush

@push('styles')
		<link href="/secure/css/basictable.css" rel="stylesheet" />
@endpush