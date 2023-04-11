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
                                <label for="nip" class="required form-label">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control form-control-solid" placeholder="NIP" value="{{$guru->nip}}" {{$guru->nip ? 'readonly' : ''}} />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="nama" class="required form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-solid" placeholder="Nama" value="{{$guru->nama}}" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="Email" value="{{$guru->email}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="tgl_lahir" class="required form-label">Tanggal Lahir</label>
                                <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-solid" placeholder="Tanggal Lahir" value="{{$guru->tgl_lahir}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="agama" class="required form-label">Agama</label>
                                <select class="form-select" name="agama">
                                    <option SELECTED DISABLED>Pilih Agama</option>
                                    <option value="islam" {{$guru->agama == "ISLAM" ? 'selected' : ''}}>Islam</option>
                                    <option value="katolik" {{$guru->agama == "KATOLIK" ? 'selected' : ''}}>Katolik</option>
                                    <option value="kristen" {{$guru->agama == "KRISTEN" ? 'selected' : ''}}>Kristen Protestan</option>
                                    <option value="buddha" {{$guru->agama == "BUDDHA" ? 'selected' : ''}}>Buddha</option>
                                    <option value="hindu" {{$guru->agama == "HINDU" ? 'selected' : ''}}>Hindu</option>
                                    <option value="konghucu" {{$guru->agama == "KONGHUCU" ? 'selected' : ''}}>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="alamat" class="required form-label">Alamat</label>
                                <textarea class="form-control" name="alamat">{{$guru->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="l" {{$guru->jenis_kelamin == "l" ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="p" {{$guru->jenis_kelamin == "p" ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="username" class="required form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-solid" placeholder="Username" value="{{$guru->pengguna ? $guru->pengguna->username : ''}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="password" class="required form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="min-w-150px text-end">
                            <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                            @if ($guru->nip)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.guru.update',$guru->nip)}}','PATCH','Simpan');" class="btn btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.guru.store')}}','POST','Simpan');" class="btn btn-primary">Simpan</button>
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
    number_only('nip');
    text_only('nama');
    format_email('email');
</script>