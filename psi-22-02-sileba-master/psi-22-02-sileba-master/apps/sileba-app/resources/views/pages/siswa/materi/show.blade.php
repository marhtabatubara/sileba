<div class='dashboard-content'>
    <div class='container'>
        <div class='card mx-5 px-5'>
            <div class='card-header mx-5 px-5'>
                <h3 class='card-title'>{{$matpel->nama_mapel}}</h3>
            </div>
            @foreach($allmateri as $item)
            <div class="card mx-5 px-5">
                <div class="card-body">
                    <div class="fw-mormal timeline-content text-muted ps-3">
                        <i class="fa fa-genderless text-success fs-1"></i><a href="{{$item->file}}">{{ucfirst($item->judul)}}</a> uploaded at {{$item->created_at}}
                    </div>
                </div>
            </div>
            <div class="separator border-dark my-10"></div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary" onclick="load_list(1);">Kembali</button>
    </div>
</div>