@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div id="container" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        const categories = {!! $categories !!}
        const purchases = {{ $purchases }}
        const sales = {{ $sales }}
        document.addEventListener('DOMContentLoaded', function() {
            const chart = Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Pembelian & Penjualan'
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                series: [{
                    name: 'Pembelian',
                    data: purchases
                }, {
                    name: 'Penjualan',
                    data: sales
                }],
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
            });
        });
    </script>
@endpush
