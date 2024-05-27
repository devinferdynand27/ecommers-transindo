@extends('layouts.custumer')

@section('content')
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width: 100%"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS56nWpZFqjKfDKCnmwOjz7pI1b4imygxDvW7_lRQ97Bw&s"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <b style="font-size: 20px">Checkout</b>
                        {{-- <form id="checkout-form" action="{{ route('create-transaction') }}" method="post"> --}}
                        @csrf
                        <div class="form-group mt-3">
                            <label for="nama">Nama Produk</label>
                            <input type="text" value="{{$transaksi->produk->name}}" class="form-control" disabled id="nama" name="nama" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="qty">Qty Produk</label>
                            <input type="number" class="form-control" value="{{$transaksi->qty}}" disabled id="qty" name="qty" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="total_harga">Harga Produk</label>
                            <input type="number" class="form-control" id="total_harga"  value="{{$transaksi->total_harga}}" name="total_harga" disabled required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" class="btn btn-success text-white" style="background: orange"
                                id="pay-button">Pesankan</button>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?= $snapToken ?>', {
                // Optional
                onSuccess: function(result) {
                    $.ajax({
                        url: '{{ route('order-success', ['sewa' => $transaksi->id]) }}',
                        type: 'GET',
                        data: {
                            param1: {{ $transaksi->id }},
                          
                        },
                        success: function(result) {
                            window.location.href = '/order-success';
                            document.getElementById('result-json').innerHTML += JSON.stringify(
                                result.data, null, 2);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
