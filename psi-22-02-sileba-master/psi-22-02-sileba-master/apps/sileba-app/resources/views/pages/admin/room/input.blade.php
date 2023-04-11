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
                                            <h2>Tambah Data Kelas</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Nama Kelas</label>
                                            <input type="text" name="kode_kelas" class="form-control mb-2" placeholder="Masukkan Nama Kelas Anda" value="{{ $room->kode_kelas }}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Tahun Ajaran</label>
                                            <input type="text" name="tahun" class="form-control mb-2" placeholder="Masukkan Nama Tahun Ajaran Kelas" value="{{ $room->tahun }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                        @if ($room->id)
                        <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('admin.room.update',$room->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Silahkan Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('admin.room.store')}}','POST');" class="btn btn-primary">
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