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
        <div class="col-12 col-md-4">
          <div class="card">
            <img src="{{ Storage::url($partner->logo) }}" height="100" class="card-img-top" alt="{{ $partner->nama }}">
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
              {{-- <form action="{{ route('admin.partner.destroy', $partner->id) }}" class="d-inline-block" method="post">
                @csrf @method("DELETE")
                <button type="submit" name="button" class="btn p-0 btn-link text-danger text-capitalize">hapus partner</button>
              </form> --}}
            </div>
          </div>

          {{-- <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div> --}}

        </div>
      @endforeach
    </div>
    <div class="row justify-content-end">
      {{ $partners->links('vendor.pagination.bootstrap-4') }}
    </div>
  </main>
@endsection
