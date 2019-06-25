@extends('temp.main')

@section('title-page', 'E-Bina | Admin - Mitra')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<style media="screen">
  ul, li {
    list-style-type: none;
    margin-bottom: 20px;
  }
  .modal li p:first-child {
    margin-bottom: 10px;
    color: #626262;
    font-weight: normal;
  }
  .modal li p:last-child {
    font-weight: bold;
    color: #414141;
  }
  select, option {
    -webkit-appearance: none;
  }
</style>
@endsection

@section ('title-body', 'Mitra')

@section('content')
@if (Session::has('success_message') || Session::has('failed_message'))
<div class="col-12 message-session">
	<div class="alert alert-{{(Session::has('success_message'))? 'success' : 'danger'}} text-center">
    {{(Session::has('success_message'))? Session::get('success_message') : Session::get('failed_message')}}
  </div>
</div>
@endif
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="card-title text-center">List Mitra</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover datatables">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Status</th>
							<th>Hp</th>
              <th>Detail</th>
							<th class="text-left">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($mitra as $value)
						<tr>
							<td class="text-capitalize">{{ $value->nama }}</td>
							<td>{{ $value->email }}</td>
							<td>
                @if ($value->status == 'bergabung')
                  <small class="badge badge-success text-uppercase">{{ $value->status }}</small>
                @else
                  <small class="badge badge-secondary text-uppercase">{{ $value->status }}</small>
                @endif
              </td>
							<td>{{ $value->hp }}</td>
              <td>
                <button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#mitraLihat{{ $value->id }}">
                  Lihat Detail
                </button>
                <div class="modal fade" id="mitraLihat{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="mitraLihat{{ $value->id }}Label"
                aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="h3">Detail Mitra {{ $value->nama }}</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul>
                          <li>
                            <p class="mb-0">Nama Mitra</p>
                            <p class="text-capitalize">{{ $value->nama }}</p>
                          </li>
                          <li>
                            <p class="mb-0">Email Mitra</p>
                            <p>{{ $value->email }}</p>
                          </li>
                          <li>
                            <p class="mb-0">Status Saat Ini</p>
                            <p>{{ $value->status }}</p>
                          </li>
                          <li>
                            <p class="mb-0">Nomor Mitra</p>
                            <p>{{ $value->hp }}</p>
                          </li>
                          <li>
                            <p class="mb-0">Alamat Mitra</p>
                            <p>{{ $value->alamat }}</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
							<td>
                <button type="button" class="btn btn-link text-warning" data-toggle="modal" data-target="#mitra{{ $value->id }}">
                  Ubah Status
                </button>
                <div class="modal fade" id="mitra{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="mitra{{ $value->id }}Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="h3">Ubah Status Saat Ini</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('admin.mitra.update', $value->id) }}" method="post">
                          @csrf @method('PUT')
                          <div class="form-group">
                            <input type="text" class="form-control-plaintext text-capitalize" value="{{ $value->nama }}" readonly>
                          </div>
                          <select name="status" class="custom-select">
                            <option disabled>Status Saat Ini</option>
                            <option value="pending" @if ($value->status == 'pending') selected @endif>Pending</option>
                            <option value="bergabung"  @if ($value->status == 'bergabung') selected @endif>Bergabung</option>
                          </select>
                          <button type="submit" class="btn btn-success mt-3 float-right">Ubah Status</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="{{ route('admin.mitra.destroy', $value->id) }}" class="d-inline-block" onsubmit="return confirm('are you sure?')" method="POST">
									@csrf	@method('DELETE')
									<button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Klien">Hapus Mitra</button>
								</form>
              </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.datatables').dataTable();
		$('.message-session').delay(3000).slideUp(600);
	});
</script>
@endsection
