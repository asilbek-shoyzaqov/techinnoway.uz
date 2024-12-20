<!-- Fayl qo'shish modali -->
@can('create')
    <div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="addFileModalLabel">Fayl qo'shish</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image">Rasm yuklash (JPEG, PNG)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                   onchange="checkFileSize(this, 2)">
                        </div>

                        <div class="form-group">
                            <label for="file">Hujjat yuklash (PDF, DOCX, ZIP)</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.zip"
                                   onchange="checkFileSize(this, 5)">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bekor qilish</button>
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan

<script>
    function checkFileSize(input, maxSizeMB) {
        const file = input.files[0];
        if (file) {
            const fileSizeMB = file.size / 1024 / 1024; // Fayl hajmini MBga aylantirish
            if (fileSizeMB > maxSizeMB) {
                alert(`Fayl hajmi ${maxSizeMB} MB dan oshmasligi kerak. Siz yuklagan fayl hajmi: ${fileSizeMB.toFixed(2)} MB.`);
                input.value = ''; // Fayl maydonini tozalash
            }
        }
    }
</script>
