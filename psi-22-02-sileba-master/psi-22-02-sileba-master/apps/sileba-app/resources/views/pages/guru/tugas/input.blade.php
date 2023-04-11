<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <form id="room_form" class="form d-flex flex-column flex-lg-row"
                data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                            role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Tambah Data Tugas</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Pilih Mata Pelajaran</label>
                                            <select data-control="select2" data-placeholder="Pilih Mata Pelajaran" name="matpel" class="form-select form-select-solid">
                                                <option SELECTED DISABLED>Pilih Mata Pelajaran</option>
                                                @foreach ($matpel as $item)
                                                    <option value="{{$item->id}}" {{$tuga->matpel_id == $item->id ? 'selected' : ''}}>{{$item->nama_mapel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Judul Tugas</label>
                                            <input type="text" name="judul" class="form-control mb-2" placeholder="Masukkan Judul Tugas Pelajaran Anda" value="{{ $tuga->judul_tugas }}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Berkas Tugas</label>
                                            <input type="file" name="berkas_tugas" class="form-control mb-2" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Waktu Mulai</label>
                                            <input type="text" name="start_at" id="start_at" class="form-control mb-2" placeholder="Masukkan Waktu Mulai Tugas Pelajaran Anda" value="{{ $tuga->start_at }}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Deadline</label>
                                            <input type="text" name="end_at" id="end_at" class="form-control mb-2" placeholder="Masukkan Waktu Berakhir Tugas Pelajaran Anda" value="{{ $tuga->end_at }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                        @if ($tuga->id)
                        <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('guru.tugas.update',$tuga->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Silahkan Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('guru.tugas.store')}}','POST');" class="btn btn-primary">
                                <span class="indicator-label">Tambah</span>
                                <span class="indicator-progress">Silahkan Tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    obj_mindatetimepicker('#start_at');
    obj_mindatetimepicker('#end_at');
</script>