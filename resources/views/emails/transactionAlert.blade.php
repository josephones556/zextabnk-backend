@component('mail::message')
# Dear {{ $data['fullName'] }},

We wish to inform you that a {{ $data['type'] }} transaction occurred on your account with us.

The details of this transaction are shown below:
<br />
<br />
Transaction Type : {{ $data['type'] }} <br />
Amount : ${{ number_format($data['amount'], 2) }} <br />
Document Number	: {{ $data['reference'] }}<br />
<br />
<br />
Available Balance: ${{ number_format($data['balance'], 2) }} <br />
<br />
<br />
Thank you for choosing {{ config('app.name') }}.

@endcomponent
