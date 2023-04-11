<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama Mata Pelajaran</th>
            <th>Nama Tugas</th>
            <th>Nama Siswa</th>
            <th>File Tugas</th>
            <th>Nilai</th>
            <th>Diupload Pada</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->nama_mapel}}</td>
            <td>{{$item->judul_tugas}}</td>
            <td>{{$item->nama}}</td>
            <td> <a href="{{asset('storage/'.$item->file)}}">File Tugas</a></td>
            <td>{{$item->nilai}}</td>
            <td>{{$item->diupload_pada}}</td>
            <td>
                <a href="javascript:;" onclick="load_input('{{route('guru.nilai.edit',$item->id)}}');" class="btn btn-icon btn-warning"><i class="las la-edit fs-2"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}