<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container" id="kt_content_container">
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <form id="form_input">
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nim" class="required form-label">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control form-control-solid" placeholder="NISN" value="{{$siswa->nisn}}" {{$siswa->nisn ? 'readonly' : ''}} />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nama" class="required form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-solid" placeholder="Nama" value="{{$siswa->nama}}" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="Email" value="{{$siswa->email}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="tgl_lahir" class="required form-label">Tanggal Lahir</label>
                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-solid" placeholder="Tanggal Lahir" value="{{$siswa->tgl_lahir}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="agama" class="required form-label">Agama</label>
                                <select class="form-select" name="agama">
                                    <option SELECTED DISABLED>Pilih Agama</option>
                                    <option value="islam" {{$siswa->agama == "ISLAM" ? 'selected' : ''}}>Islam</option>
                                    <option value="katolik" {{$siswa->agama == "KATOLIK" ? 'selected' : ''}}>Katolik</option>
                                    <option value="kristen" {{$siswa->agama == "KRISTEN" ? 'selected' : ''}}>Kristen Protestan</option>
                                    <option value="buddha" {{$siswa->agama == "BUDDHA" ? 'selected' : ''}}>Buddha</option>
                                    <option value="hindu" {{$siswa->agama == "HINDU" ? 'selected' : ''}}>Hindu</option>
                                    <option value="konghucu" {{$siswa->agama == "KONGHUCU" ? 'selected' : ''}}>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="alamat" class="required form-label">Alamat</label>
                                <textarea class="form-control" name="alamat">{{$siswa->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="jenis_kelamin" class="required form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="l" {{$siswa->jenis_kelamin == "l" ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="p" {{$siswa->jenis_kelamin == "p" ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="username" class="required form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-solid" placeholder="Username" value="{{$siswa->pengguna ? $siswa->pengguna->username : ''}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="password" class="required form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="kelas" class="required form-label">Kelas</label>
                                <select name="kelas" class="form-select">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $kl)
                                        <option value="{{$kl->id}}" {{$kl->id == $siswa->kelas_id ? 'selected' : ''}}>{{$kl->kode_kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="min-w-150px text-end">
                            <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                            @if ($siswa->nisn)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.siswa.update',$siswa->nisn)}}','PATCH','Simpan');" class="btn btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.siswa.store')}}','POST','Simpan');" class="btn btn-primary">Simpan</button>
                            @endif
                        </div>
                        <!--end::Col-->
                    </div>
                </form>
                <!--end::Row-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<script type="text/javascript">
    obj_datepicker('#tgl_lahir');
    number_only('nisn');
    text_only('nama');
    format_email('email');
</script>