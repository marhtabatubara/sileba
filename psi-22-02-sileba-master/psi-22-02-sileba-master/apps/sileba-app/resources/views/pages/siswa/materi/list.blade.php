<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama Mata Pelajaran</th>
            <th>Kelas</th>
            {{-- <th>Judul</th>
            <th>Deskripsi</th>
            <th>Berkas Materi</th> --}}
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->nama_mapel}}</td>
            <td>{{$item->kelas->kode_kelas}}</td>
            {{-- <td>{{$item->judul}}</td>
            <td>{{$item->deskripsi}}</td>
            <td><a target="_blank"href="{{$item->file}}">Materi</a></td> --}}
            <td>
                <a href="javascript:;" onclick="load_input('{{route('siswa.materi.show',$item->id)}}');" class="btn btn-icon btn-warning"><i class="las la-eye fs-2"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}