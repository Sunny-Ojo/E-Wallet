<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wallet Funding is Successful</title>
</head>

<body>
    <h1>Hello {{ Auth::user()->name }},</h1>
    <p>You have Successfully Funded your wallet with the sum of &#8358;{{ number_format($data['amount']) }} and your
        wallet balance is &#8358;{{ number_format(Auth::user()->amount) }}.</p>
    <p>Funding Description: {{ $data['description'] }}.</p>
    <br>
    <br>
    Thanks for Choosing us,
    <h4>Team Smart Wallet.</h4>
</body>

</html>
