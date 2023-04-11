<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama</th>
            <th>Judul Tugas</th>
            <th>Berkas Tugas</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->nama_mapel}}</td>
            <td>{{$item->judul_tugas}}</td>
            <td><a href="{{$item->file}}" target="_blank">Tugas</a></td>
            <td>{{$item->start_at}}</td>
            <td>{{$item->end_at}}</td>
            @if((date('Y-m-d H:i:s')) >= $item->end_at)
            <td>
                <p>Anda tidak bisa submit tugas lagi</p>
            </td>
            @else
            <td>
                <a href="javascript:;" onclick="load_input('{{route('siswa.tugas.show',$item->id)}}');" class="btn btn-icon btn-warning"><i class="las la-eye fs-2"></i></a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}