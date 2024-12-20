<!-- Fayl tahrirlash modali -->
@can('edit')
    <div class="modal fade" id="editFileModal" tabindex="-1" role="dialog" aria-labelledby="editFileModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editFileForm" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editFileModalLabel">Faylni tahrirlash</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="currentImage">Joriy rasm:</label>
                            <p id="currentImage" class="form-text text-muted"></p>
                        </div>

                        <div class="form-group">
                            <label for="image">Rasm (JPEG, PNG)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                   onchange="checkFileSize(this, 2)">
                        </div>

                        <div class="form-group">
                            <label for="currentFile">Joriy hujjat:</label>
                            <p id="currentFile" class="form-text text-muted"></p>
                        </div>

                        <div class="form-group">
                            <label for="file">Hujjat (PDF, DOCX, ZIP)</label>
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
    function openEditFileModal(file) {
        // Joriy fayl nomlarini modal oynada ko'rsatish
        document.getElementById('currentImage').textContent = file.image ? file.image.split('/').pop() : 'Rasm mavjud emas';
        document.getElementById('currentFile').textContent = file.file ? file.file.split('/').pop() : 'Fayl mavjud emas';

        // Tahrirlash formasining action URLini yangilash
        document.getElementById('editFileForm').action = '/admin/files/' + file.id;

        // Modal oynani ochish
        $('#editFileModal').modal('show');
    }
</script>
