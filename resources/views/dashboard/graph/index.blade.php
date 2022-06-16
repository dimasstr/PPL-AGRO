@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="bg-light text-dark rounded mb-2">
            <div class="col-md-12 my-2">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb mx-3">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Grafik Transaksi</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row mt-2">
                <div class="col-lg-4">
                    <h3>Grafik Penjualan</h3>
                    <p>Grafik penjualan pada tahun ini.</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="grafik"></div>
        </div>
    </div>
</div>



<script src="https://code.highcharts.com/highcharts.js"></script>
{{-- <script> 
    var nominal = <?php echo json_encode($total) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik', {
            title : {
                    text: 'Grafik Pendapatan Bulanan'
                },
                xAxis : {
                        categories : bulan
                    },
                    yAxis : {
                            title :{
                                    text : 'Nominal Pendapatan Bulanan'
                                }
                            };
                            plotOptions: {
                                    series: {
                                            allowPointSelect: true
                                        }
                                    };
                                    series: [
                                            {
                                                    name: 'Nominal Pendapatan',
                                                    data: nominal
                                                }
                                            ]
                                        });
                                        
                                        </script> --}}
<script> 
                                        
Highcharts.chart('grafik', {

    title: {
        text: 'Grafik Pendapatan Bulanan'
    },

    subtitle: {
        text: 'Statistik pendapatan bisnis Anda'
    },

    yAxis: {
        title: {
            text: 'Nominal Pendapatan Bulanan'
        }
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    series: [{
        name: 'Pendapatan',
        data: {!! json_encode($total) !!}
    }],

});
</script>
@endsection