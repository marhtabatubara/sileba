<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama Mata Pelajaran</th>
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
            <td>
                <a href="javascript:;" onclick="load_input('{{route('guru.tugas.edit',$item->id)}}');" class="btn btn-icon btn-warning"><i class="las la-edit fs-2"></i></a>
                <a href="javascript:;" onclick="handle_delete('{{route('guru.tugas.destroy',$item->id)}}');" class="btn btn-icon btn-danger"><i class="las la-trash fs-2"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}