<!-- Fayllar ro'yxati -->
<div class="col-md-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Fayllar ro'yxati</h4>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addFileModal">Fayl
                qo'shish
            </button>
        </div>
        <div class="card-body">
            <div class="custom-scroll">
                @foreach($files as $file)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ $loop->iteration }}. Fayl</strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Rasm:
                                    @if ($file->image)
                                        <a href="{{ Storage::url($file->image) }}" target="_blank">
                                            <img src="{{ Storage::url($file->image) }}" width="300px">
                                        </a>
                                    @else
                                        Rasm yuklanmagan
                                    @endif
                                </li>
                                <li class="list-group-item">Hujjat:
                                    @if ($file->file)
                                        <a href="{{ Storage::url($file->file) }}" target="_blank">
                                            <i class="fas fa-file-alt fa-2x"></i> {{ basename($file->file) }}
                                        </a>
                                    @else
                                        Fayl yuklanmagan
                                    @endif
                                </li>
                            </ul>
                            <div class="card-body">
                                <button onclick="openEditFileModal({{ json_encode($file) }})"
                                        class="btn btn-sm btn-primary">Tahrirlash
                                </button>
                                @can('delete')
                                    <form
                                        action="{{ route('admin.files.destroy', $file->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('O\'chirishni xohlaysizmi')"
                                                class="btn btn-sm btn-danger">O'chirish
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scroll {
        max-height: 508px;
        overflow-y: auto;
        overflow-x: hidden; /* Gorizontal scrollni o'chirish uchun */
    }
</style>
