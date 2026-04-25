<form action="{{ $url }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 inline-block" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
</form>