<div class='dashboard-content'>
    <div class='container'>
        <div class='card'>
            <div class='card-header'>
                @if(!$pengumpulan)
                    <h3 class='card-title'>Tambahkan Tugas Anda pada Form Berikut</h3>
                @else
                    <h3 class='card-title'>Ubah Tugas Anda</h3>    
                @endif
            </div>
            <div class="card-body">
                <form id="tugas_form">
                    <div class="form-group row p-2">
                    <label for="staticTanggal" class="col-sm-2 col-form-label p-2">Deadline</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="tugas_id" value="{{$tuga->id}}">
                        <input type="text" readonly class="form-control-plaintext" id="Tanggal" value=": {{$tuga->end_at}}">
                    </div>
    
                    <label for="staticstatus" class="col-sm-2 col-form-label p-2">Status</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="status" value=": {{$pengumpulan == null ? 'Belum dikirim' : 'Sudah dikirim'}}">
                    </div> 
    
                    <label for="staticFile" class="col-sm-2 col-form-label p-2">File</label>
                    <div class="col-sm-10">
                        <input class="form-control-plaintext" type="file" name="file" class="upload-file">
                    </div> 
    
                    <div class="w-25 p-3 h-100">
                        <button type="button" class="btn btn-secondary" onclick="load_list(1);">Kembali</button>
                        <button id="button_submit" onclick="handle_upload('#button_submit','#tugas_form','{{route('siswa.tugas.store')}}','POST');" class="btn btn-success">Submit</button>
                    </div><br>
                </form>  
            </div>
        </div>
    </div>
</div>