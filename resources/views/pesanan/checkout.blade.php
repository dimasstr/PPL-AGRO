@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row">
            <div class="bg-light text-dark rounded">
                <div class="col-md-12 my-2">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-3">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <h2>Checkout</h2>
                        <p>Pesanan Anda telah berhasil dilakukan. Silahkan untuk melanjutkan pembayaran melalui Transfer ATM Mandiri ke 0213484732 atas nama Nanis </p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($order_details as $order_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td align="center" class=""><img src="{{ asset('storage/'.$order_detail->product->image) }}"  style="width: 150px; height: 115px" </td>
                                    <td>Kripik {{ $order_detail->product->variant }}</td>
                                    <td align="center">{{ $order_detail->jumlah }}</td>
                                    <td align="right">Rp {{ number_format($order_detail->product->price) }}</td>
                                    <td align="right">Rp {{ number_format($order_detail->jumlah_harga) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Ongkos Kirim :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order_detail->ongkir) }}</strong></td> 
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order_detail->ongkir+$order->jumlah_harga) }}</strong></td>
                                </tr>
                                
                                @if(!empty($order->image))
                                    <tr>
                                        <td colspan="5" align="left"><strong>Bukti Pembayaran</strong></td>
                                        <td align="right"><img src="{{ asset('storage/'.$order->image) }}" style="width: 150px; height: 115px"</td>
                                    </tr>
                                    @endif
                                </tbody>
                                @if($order->status_id == 3)
                                <td colspan="2" >
                                    <a href="/" class="btn btn-success d-flex justify-content-center" align="right" onclick="return confirm('Apakah pesanan Anda sudah anda terima dalam keadaan baik?');">
                                        Pesanan Diterima
                                    </a>
                                </td>
                                @endif
                            <form action="/checkout/{{ $order->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <strong><label for="image" class="form-label ">Bukti Pembayaran</label></strong>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                    <button type="submit" class="btn btn-primary my-2">Upload Bukti Pembayaran</button>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection