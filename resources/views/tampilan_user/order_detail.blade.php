<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <div class="card">
    <div class="container card-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-info" role="alert">
        {{ $message }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-10">
        Total Item
        </div>
        <div class="col-sm-2">
        {{ $order->total_item}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
        Total Harga
        </div>
        <div class="col-sm-2">
        {{ $order->total_price}}
        </div>
    </div>
    <div class="card-footer">
    <div class="row">
        <div class="col-sm-2">
        <button type="button" class="btn btn-success" id="pay-button">Bayar Sekarang</button>
        </div>
        {{-- <div class="col-sm-2">
            <a href="{{ route('order.getall') }}"> <button type="button" class="btn btn-warning">bayar nanti</button></a>
            </div> --}}
    </div>
</div>
</div>
</div>
<script type="text/javascript">
      // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
        /* You may add your own implementation here */
        // alert("payment success!");
        window.location.href = '/order-all';
        console.log(result);
        },
        onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
        },
        onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
        }
    })
    });
</script>
</body>
