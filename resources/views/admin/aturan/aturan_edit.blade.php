<form action="{{ route('admin.aturan.store', $edit_aturan->id) }}" method="post">
  @csrf
  <input type="text" name="judul" placeholder="Judul Peraturan">
  <textarea name="deskripsi" rows="10" placeholder="Deskripsi Peraturan"></textarea>
  <button type="submit">Update Peraturan</button>
</form>
