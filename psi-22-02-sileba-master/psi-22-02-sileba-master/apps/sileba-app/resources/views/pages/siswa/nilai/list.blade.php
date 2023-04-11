<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama Mata Pelajaran</th>
            <th>Nama Tugas</th>
            <th>Nilai</th>
            <th>Diupload Pada</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->tugas->matpel->nama_mapel}}</td>
            <td>{{$item->tugas->judul_tugas}}</td>
            <td>{{$item->nilai}}</td>
            <td>{{$item->diupload_pada}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}