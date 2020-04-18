									<!-- Live updates start -->
									<?php
										$creditcard = $user->account->card_activities()->orderBy('date', 'desc')->first();
										$credit = $user->account->transactions()->where('type', 'Credit')->orderBy('date', 'desc')->first();
										$debit = $user->account->transactions()->where('type', 'Debit')->orderBy('date', 'desc')->first();
									?>
									<ul class="updates" id="updates">
										<li>
											<a href="javascript:void(0)">
												<i class="icon-drafts"></i>
												<span>Your Current Balance Is $ {{ number_format($user->account->balance, 2) }}</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<i class="icon-drafts"></i>
												<span>Your Last Credit Card Withdrawal Was $ {{ number_format($creditcard->amount, 2) }}</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<i class="icon-drafts"></i>
												<span>Your Last Account Debit Was $ {{ number_format($debit->amount, 2) }}</span>
											</a>
										</li>
										<li>
											<a href="javascript:void(0)">
												<i class="icon-drafts"></i>
												<span>Your Last Account Credit Was $ {{ number_format($credit->amount, 2) }}</span>
											</a>
										</li>
									</ul>
									<!-- Live updates end -->