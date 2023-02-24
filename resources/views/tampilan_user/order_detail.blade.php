@extends('tampilan_user.master_user_login')
@section('title', 'Futsal Field Rental')
@section('content')
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<div class="container">
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
    <div class="row">
        <div class="col-sm-2">
        <button type="button" class="btn btn-success" id="pay-button">Bayar Sekarang</button>
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
        alert("payment success!"); console.log(result);
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
@endsection