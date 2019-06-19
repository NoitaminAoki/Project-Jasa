@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section ('title-body', 'Dashboard')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
		{{ (Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message') }}
	</div>
</div>
@endif
<div class="col-12 col-md-6">
	<div class="info-box">
		<span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Active Member(s)</span>
			<span class="info-box-number">{{ $memberActive }}</span>
		</div>
	</div>
</div>
<div class="col-12 col-md-6">
	<div class="info-box">
		<span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>
		<div class="info-box-content">
			<span class="info-box-text">Unactive Member(s)</span>
			<span class="info-box-number">{{ $memberUnactive }}</span>
		</div>
	</div>
</div>
<div class="col-md-3 col-12">
	<!-- small card -->
	<div class="small-box bg-primary">
		<div class="inner">
			<h3>{{$all_klien}}</h3>
			
			<p>Klien : All</p>
		</div>
		<div class="icon">
			<i class="fa fa-users"></i>
		</div>
		<a href="{{route('admin.klien.index')}}" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="col-md-3 col-12">
	<!-- small card -->
	<div class="small-box bg-success">
		<div class="inner">
			<h3>{{$deal_klien}}</h3>
			
			<p>Klien : Deal</p>
		</div>
		<div class="icon">
			<i class="fa fa-users"></i>
		</div>
		<a href="{{route('admin.klien.index')}}" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="col-md-3 col-12">
	<!-- small card -->
	<div class="small-box bg-warning">
		<div class="inner">
			<h3>{{$negosiasi_klien}}</h3>
			
			<p>Klien : Negosiasi</p>
		</div>
		<div class="icon">
			<i class="fa fa-users"></i>
		</div>
		<a href="{{route('admin.klien.index')}}" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="col-md-3 col-12">
	<!-- small card -->
	<div class="small-box bg-secondary">
		<div class="inner">
			<h3>{{$pending_klien}}</h3>
			
			<p>Klien : Pending</p>
		</div>
		<div class="icon">
			<i class="fa fa-users"></i>
		</div>
		<a href="{{route('admin.klien.index')}}" class="small-box-footer">
			More info <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>
<div class="col-md-4 col-sm-6 col-12">
	<div class="info-box bg-primary-gradient">
		<span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>
		
		<div class="info-box-content">
			<span class="info-box-text">Total Pendapatan</span>
			<span class="info-box-number">Rp {{number_format($pendapatan+$potensi_pendapatan, 0, ',', '.')}}</span>
			
			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				100% from (pendapatan + potensi)
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4 col-sm-6 col-12">
	<div class="info-box bg-success-gradient">
		<span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>
		
		<div class="info-box-content">
			<span class="info-box-text">Pendapatan</span>
			<span class="info-box-number">Rp {{number_format($pendapatan, 0, ',', '.')}}</span>
			
			<div class="progress">
				<div class="progress-bar" style="width: {{$percentage['pendapatan']}}%"></div>
			</div>
			<span class="progress-description">
				{{(is_float($percentage['pendapatan']))? number_format((float)$percentage['pendapatan'], 1) : $percentage['pendapatan']}}% from total
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-md-4 col-sm-6 col-12">
	<div class="info-box bg-warning-gradient">
		<span class="info-box-icon"><i class="fa fa-money-bill-wave-alt"></i></span>
		
		<div class="info-box-content">
			<span class="info-box-text">Potensi Pendapatan</span>
			<span class="info-box-number">Rp {{number_format($potensi_pendapatan, 0, ',', '.')}}</span>
			
			<div class="progress">
				<div class="progress-bar" style="width: {{$percentage['potensi_pendapatan']}}%"></div>
			</div>
			<span class="progress-description">
				{{(is_float($percentage['potensi_pendapatan']))? number_format((float)$percentage['potensi_pendapatan'], 1) : $percentage['potensi_pendapatan']}}% from total
			</span>
		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>
<div class="col-lg-8">
	
	<div class="card">
		<div class="card-header no-border">
			<div class="d-flex justify-content-between">
				<h3 class="card-title">Penghasilan</h3>
				<a href="{{route('admin.penghasilan.index')}}">View All</a>
			</div>
		</div>
		<div class="card-body" style="overflow-x: auto;">
			<div class="col-12" style="min-width: 500px;">
				<div class="d-flex">
					<p class="d-flex flex-column">
						<span>Revenue Over Time</span>
					</p>
					<p class="ml-auto d-flex flex-column text-right">
						<span class="text-muted">Date: {{$startDate}} - {{$endDate}}</span>
					</p>
				</div>
				<!-- /.d-flex -->
				
				<div class="position-relative mb-4">
					<canvas id="penghasilan-chart" height="200"></canvas>
				</div>
				
				<div class="d-flex flex-row justify-content-end">
					<span class="mr-2">
						<i class="fa fa-square text-gray"></i> Pending
					</span>
					
					<span>
						<i class="fa fa-square text-warning"></i> Negosiasi
					</span>
					
					<span>
						<i class="fa fa-square text-success"></i> Deal
					</span>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="row">
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
						<h5 class="description-header">IDR {{number_format($pendapatanChart/1000, 0, ',', '.')}}K</h5>
						<span class="description-text">TOTAL REVENUE</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
						<h5 class="description-header">IDR {{number_format($pendapatanChartPending/1000, 0, ',', '.')}}K</h5>
						<span class="description-text">TOTAL PENDING</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
						<h5 class="description-header">IDR {{number_format($pendapatanChartNegosiasi/1000, 0, ',', '.')}}K</h5>
						<span class="description-text">TOTAL NEGOSIASI</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block">
						<h5 class="description-header">IDR {{number_format($pendapatanChartDeal/1000, 0, ',', '.')}}K</h5>
						<span class="description-text">TOTAL DEAL</span>
					</div>
					<!-- /.description-block -->
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card -->
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Popular Member</h3>
			
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<ul class="products-list product-list-in-card pl-2 pr-2">
				@foreach ($popularMember as $value)
				<li class="item">
					<div class="product-img">
						<img src="{{ (Storage::exists($value->profile_picture))? Storage::url($value->profile_picture) : asset('dist/img/avatar5.png') }}" alt="Product Image" class="img-size-50">
					</div>
					<div class="product-info">
						<a href="javascript:void(0)" class="product-title">{{$value->name}}
							<span class="badge badge-success float-right">IDR {{number_format($value->pendapatan/1000, 0, ',', '.')}}K</span></a>
							<span class="product-description">
								{{$value->noTelp}}
							</span>
						</div>
					</li>
					@endforeach
					
				</ul>
			</div>
			<!-- /.card-body -->
			<div class="card-footer text-center">
				<a href="{{ route('admin.member.index') }}" class="uppercase">View All Members</a>
			</div>
			<!-- /.card-footer -->
		</div>
	</div>
	@endsection
	
	@section('script')
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.datatables').dataTable();
			$('.message-session').delay(3000).slideUp(600);
		});
		$(function () {
			'use strict'
			
			var ticksStyle = {
				fontColor: '#495057',
				fontStyle: 'bold'
			}
			
			var mode      = 'index'
			var intersect = true
			
			var $penghasilanChart = $('#penghasilan-chart')
			var penghasilanChart  = new Chart($penghasilanChart, {
				type   : 'bar',
				data   : {
					labels  : {!! json_encode($xAxis) !!},
					datasets: [
					{
						backgroundColor: '#c8c8cc',
						borderColor    : '#c8c8cc',
						data           : {!! json_encode($chartPending) !!}
					},
					{
						backgroundColor: '#ffc107',
						borderColor    : '#ffc107',
						data           : {!! json_encode($chartNegosiasi) !!}
					},
					{
						backgroundColor: '#28a745',
						borderColor    : '#28a745',
						data           : {!! json_encode($chartDeal) !!}
					}
					]
				},
				options: {
					maintainAspectRatio: false,
					tooltips           : {
						mode     : mode,
						intersect: intersect
					},
					hover              : {
						mode     : mode,
						intersect: intersect
					},
					legend             : {
						display: false
					},
					scales             : {
						yAxes: [{
							// display: false,
							gridLines: {
								display      : true,
								lineWidth    : '4px',
								color        : 'rgba(0, 0, 0, .2)',
								zeroLineColor: 'transparent'
							},
							ticks    : $.extend({
								beginAtZero: true,
								
								// Include a dollar sign in the ticks
								callback: function (value, index, values) {
									if (value >= 1000000) {
										value /= 1000000
										value += 'JT'
									}
									return value
								}
							}, ticksStyle)
						}],
						xAxes: [{
							display  : true,
							gridLines: {
								display: false
							},
							ticks    : ticksStyle
						}]
					}
				}
			})
		});
	</script>
	@endsection
	