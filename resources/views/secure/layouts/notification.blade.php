@if(\Cache::has($user->account->account_number . 'isLimited'))

	<div class="col-12">
		<div class="card top-red-bdr text-center">
			<div class="card-body">
				<p class="card-text"><strong>You Have Reached Your Transfer & Debit Limit For {{ date('F Y')}}.</strong></p>
			</div>
		</div>
	</div>

@elseif(\Cache::has($user->account->account_number . 'isBlocked'))

	<div class="col-12">
		<div class="card top-red-bdr text-center">
			<div class="card-body">
				<p class="card-text">
					<strong> 
						@if(\Cache::has($user->account->account_number . '_block_message'))
							{{ \Cache::get($user->account->account_number . '_block_message') }}
						@else
							Your Account Has Been Temporarily Disabled Due To Suspicious Fraudulent Activities, Kindly Visit {{ config('app.name') }} To Rectify This Issue.
						@endif
					</strong>
				</p>
			</div>
		</div>
	</div>

@endif