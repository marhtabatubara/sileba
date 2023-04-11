<!--end::Search form-->
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
                                <label for="nama" class="required form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control form-control-solid" placeholder="Nama" value="{{$admin->nama}}" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control form-control-solid" placeholder="Email" value="{{$admin->email}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="jenis_kelamin" class="required form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control form-control-solid">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="l" {{$admin->jenis_kelamin == 'l' ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="p" {{$admin->jenis_kelamin == 'p' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="username" class="required form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control form-control-solid" placeholder="Username" value="{{$admin->pengguna ? $admin->pengguna->username : ''}}"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="id_operator" class="required form-label">Id Operator</label>
                                <input type="text" name="id_operator" id="id_operator" class="form-control form-control-solid" placeholder="ID Operator" {{$admin->id_operator ? 'readonly': ''}} value="{{$admin->pengguna ? $admin->pengguna->id_operator : ''}}"/>
                            </div>
                        </div>
                        @if (!$admin->id_operator)
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-10">
                                <label for="password" class="required form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Password"/>
                            </div>
                        </div>
                        @endif
                        <div class="min-w-150px text-end">
                            <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                            @if ($admin->id_operator)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.admin.update',$admin->id_operator)}}','PATCH','Simpan');" class="btn btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.admin.store')}}','POST','Simpan');" class="btn btn-primary">Simpan</button>
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
    text_only('nama');
    number_only('phone');
    format_email('email');
</script>