<table class="table table-rounded table-striped border gy-7 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Username</th>
            <th>Id Operator</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($collection as $item)
        <tr>
            <td>{{$item->nama}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->jenis_kelamin == 'l' ? 'Laki-Laki' : 'Perempuan' }}</td>
            <td>{{$item->Username}}</td>
            <td>{{$item->id_operator}}</td>
            <td>
                <a href="javascript:;" onclick="load_input('{{route('admin.admin.edit',$item->id_operator)}}');" class="btn btn-icon btn-warning"><i class="las la-edit fs-2"></i></a>
                @if(Auth::user()->id != $item->id_operator)
                <a href="javascript:;" onclick="handle_delete('{{route('admin.admin.destroy',$item->id_operator)}}');" class="btn btn-icon btn-danger"><i class="las la-trash fs-2"></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}