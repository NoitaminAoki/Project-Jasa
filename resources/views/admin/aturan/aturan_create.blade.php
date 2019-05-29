<form action="{{ route('admin.aturan.store') }}" method="post">
  @csrf
  <input type="text" name="judul" placeholder="Judul Aturan">
  <textarea name="name" rows="10" placeholder="Deskripsi Aturan"></textarea>
</form>
