@extends('temp.main')
@section('title-page', 'Partner Kita')
@section('css')
  <style media="screen">
    .card-footer::after {
      content: none !important;
    }
  </style>
@endsection
@section('title-body', 'Partner')
@section('content')
  <main class="col-12">
    <div class="row">
      @foreach ($partners as $partner)
        <div class="card-group col-12 col-md-3">
          <div class="card">
            <img src="{{ asset('assets/img/' . $partner->logo)}}" height="100" class="card-img-top" alt="{{ $partner->nama }}">
            <div class="card-body">
              <strong class="card-text">{{ $partner->nama }}</strong>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a href="{{ route('admin.partner.edit', $partner->id) }}" class="text-warning text-capitalize">edit detail</a>
              <button type="button" class="btn btn-link text-danger p-0 text-capitalize" data-toggle="modal"
              data-target="#exampleModal{{ $partner->id }}">
                hapus partner
              </button>
              <div class="modal fade" id="exampleModal{{ $partner->id }}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel{{ $partner->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ $partner->nama }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Kamu Ingin Menghapus partner <strong>{{ $partner->nama . "?"}}</strong></p>
                      <form action="{{ route('admin.partner.destroy', $partner->id) }}" class="d-flex" method="post">
                        @csrf @method("DELETE")
                        <button type="submit" name="button" class="btn btn-danger text-capitalize w-100">hapus partner</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row mx-0 align-items-center justify-content-end">
      <a href="{{ route('admin.partner.create') }}" class="btn btn-primary mr-auto">Tambah Partner</a>
      {{ $partners->links('vendor.pagination.bootstrap-4') }}
    </div>
  </main>
@endsection
