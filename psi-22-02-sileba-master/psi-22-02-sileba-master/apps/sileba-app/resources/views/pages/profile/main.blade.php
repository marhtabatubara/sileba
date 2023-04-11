<x-app-layout title="My Profile">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            @if(Auth::user()->role=='o')
                @php $data = Auth::user()->operator; @endphp
            @elseif(Auth::user()->role=='g')
                @php $data = Auth::user()->guru; @endphp
            @else
                @php $data = Auth::user()->siswa; @endphp
            @endif
            <div class="row g-5 g-xxl-8">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                <div class="me-7">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <h1>Profil Pengguna</h1>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 g-xxl-8">
                <form id="form-profile">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Nama Lengkap :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nama" id="nama" value="{{$data->nama}}">
                                            </div>
                                        </div> 
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Nama Pengguna :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="username" id="username" value="{{Auth::user()->username}}">
                                            </div>
                                        </div> 
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Email :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="email" id="email" value="{{$data->email}}">
                                            </div>
                                        </div> 
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">ID Pengguna :</label>
                                            <div class="col-sm-10">
                                                @if(Auth::user()->role=='o')
                                                    <input class="form-control" type="text" name="id_operator" id="id_operator" value="{{$data->id_operator}}"readonly>
                                                @elseif(Auth::user()->role=='g')
                                                    <input class="form-control" type="text" name="nip" id="nip" value="{{$data->nip}}"readonly>
                                                @else
                                                    <input class="form-control" type="text" name="nisn" id="nisn" value="{{$data->nisn}}"readonly>
                                                @endif
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-md-2">
                                        @if(Auth::user()->role=='o')
                                            <img src="{{asset('img/avatars/user.png')}}" alt="image" style="width: 60%;"/>
                                        @elseif(Auth::user()->role=='g')
                                            <img src="{{asset('img/avatars/teacher.png')}}" alt="image" style="width: 60%;"/>
                                        @else
                                            <img src="{{asset('img/avatars/students.png')}}" alt="image" style="width: 60%;"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain pb-3">
                            <div id="kt_forms_widget_1_editor" class="py-6"></div>
                            <div class="separator"></div>
                        </div>
                    </div>

                    <div class="row g-5 g-xxl-8">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                        <div class="me-7">
                                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                <h1>Password Pengguna</h1>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card mb-xxl-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Password saat ini :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="password" id="password">
                                            </div>
                                        </div> 
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Password Baru :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="password_baru" id="password_baru">
                                            </div>
                                        </div> 
                                        <div class="form-group row p-5">
                                            <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Konfirmasi Password :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="kpassword_baru" id="kpassword_baru">
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                    <div class="min-w-150px mt-10 text-end">
                                        @php
                                        $profile = '';
                                        if (Auth::user()->role == 'o') {
                                            $profile = route('admin.profile.cprofile');
                                        } elseif (Auth::user()->role == 'g') {
                                            $profile = route('guru.profile.cprofile');
                                        } elseif (Auth::user()->role == 's') {
                                            $profile = route('siswa.profile.cprofile');
                                        }
                                    @endphp
                                        <button class="btn btn-primary" id="tombol_simpan" onclick="handle_save_password('#tombol_simpan','#form-profile','{{$profile}}','PATCH');">Kirim</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>