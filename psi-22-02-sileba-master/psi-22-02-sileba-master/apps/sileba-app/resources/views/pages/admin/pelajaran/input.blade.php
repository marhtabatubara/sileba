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
                                            <h2>Tambah Data Mata Pelajaran</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Nama Mata Pelajaran</label>
                                            <input type="text" name="nama_mapel" class="form-control mb-2" placeholder="Masukkan Nama Mata Pelajaran Anda" value="{{ $pelajaran->nama_mapel }}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Deskripsi Singkat</label>
                                            <textarea class="form-control form-control-solid" name="deskripsi">{{$pelajaran->deskripsi}}</textarea>
                                        </div> 
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Pilih Kelas</label>
                                            <select data-control="select2" data-placeholder="Pilih Kelas" name="kelas" class="form-select form-select-solid">
                                                <option SELECTED DISABLED>Pilih Kelas</option>
                                                @foreach ($kelas as $item)
                                                    <option value="{{$item->id}}" {{$pelajaran->kelas_id == $item->id ? 'selected' : ''}}>{{$item->kode_kelas}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Pilih Guru</label>
                                            <select data-control="select2" data-placeholder="Pilih Guru" name="guru" class="form-select form-select-solid">
                                                <option SELECTED DISABLED>Pilih Guru</option>
                                                @foreach ($guru as $item)
                                                    <option value="{{$item->nip}}" {{$pelajaran->guru_id == $item->nip ? 'selected' : ''}}>{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                        @if ($pelajaran->id)
                        <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('admin.pelajaran.update',$pelajaran->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Silahkan Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="room_submit"  onclick="handle_upload('#room_submit','#room_form','{{route('admin.pelajaran.store')}}','POST');" class="btn btn-primary">
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