@extends('admin/master-admin')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Produk</li>
                            <li class="breadcrumb-item active">Data Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                 <div class="card">
                    <div class="card-header">
                       Data Produk

                        <div class="float-right d-none d-sm-inline-block">
                            <a href="#" data-toggle="modal" data-target="#addmodal" class="btn btn-primary btn-sm">Tambah</a>
                        </div>

                    </div>
                    
                    <div class="card-body">
                        <form action="{{url('admin/pasar/addhandler')}}" enctype="multipart/form-data" method="POST">
                            @csrf

                        <div class="mb-3 row">
                            <label for="nis" class="col-sm-2 col-form-label">Nama Pasar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_pasar" placeholder="Nama Pasar" required value="{{old('nama_pasar')}}">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="nis" class="col-sm-2 col-form-label">Pengelola Pasar</label>
                            <div class="col-sm-10">
                                <select class="custom-select" required name="id_pengelola" id="id_pengelola">
                                    <option selected value="">- PILIH PENGELOLA PASAR -</option>
                                    @foreach($pengelola as $p)
                                            <option value="{{$p->id_pengelola}}">{{$p->nama_pengelola}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nis" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <select class="form-control" required name="provinsi" id="provinsi">
                                    <option value=""> - PILIH PROVINSI - </option>
                                    @foreach ($provinsi as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kabupaten" id="kabupaten">
                                        <option value=""> - PILIH KABUPATEN - </option>
                                    </select>
                                </div>
                        </div>

                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kecamatan" id="kecamatan">
                                        <option value=""> - PILIH KECAMATAN - </option>
                                    </select>
                                </div>
                            </div>

                        <div class="mb-3 row">
                            <label for="max_toko" class="col-sm-2 col-form-label">Maksimal Lapak</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="max_toko" placeholder="Maksimal Lapak" required value="{{old('max_toko')}}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="max_pengunjung" class="col-sm-2 col-form-label">Maksimal Pengunjung</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="max_pengunjung" placeholder="Maksimal Pengunjung" required value="{{old('max_pengunjung')}}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nis" class="col-sm-2 col-form-label">Alamat Pasar</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" class="form-control" cols="6" rows="4" placeholder="Alamat Lengkap Pasar" required>{{old('alamat')}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Pasar</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" class="form-control" cols="6" rows="4" placeholder="Deskripsi Pasar" required>{{old('deskripsi')}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nis" class="col-sm-2 col-form-label">Lokasi Pasar</label>
                            <div class="col-sm-10">
                                <textarea name="embbed_maps" class="form-control" cols="6" rows="4" placeholder="Embedded Maps" required placeholder="Embedded Maps">{{old('embbed_maps')}}</textarea>
                                <small><a target="__BLANK" href="https://google-map-generator.com/">Info Lebih lanjut mengenai Embedded maps</a></small>
                            </div>
                        </div>
                        <div class="mb-3 row control-group">
                            <label for="nis" class="col-sm-2 col-form-label">Foto Pasar</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" name="foto_pasar[]" class="form-control filefoto" required accept=".png,.jpg">
                                    <div class="input-group-prepend"> 
                                      <button class="btn btn-success addfile" type="button"><i class="fas fa-plus"></i> Add</button>
                                    </div>     

                                </div>
                                @if ($errors->has('foto_pasar.*'))
                                <div class="text-danger text-small text-muted">
                                    @foreach ($errors->get('foto_pasar.*') as $err)
                                        <span class="text-danger">@php print_r($err[0]) @endphp</span>
                                    @endforeach
                                </div>
                                @endif  
                            </div>
                        </div>
                    </div>

                        <div class="fileadd"></div>
                   
                        <div class="card-footer">
                            <button class="btn btn-primary" style="float: right">Simpan</button>
                        </div>
                    </form> 
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function(){
            $('.addfile').click(function(){
                var html = '';
                html += '<div class="mb-3 row control-group" id="removefile">';
                html += '<label for="foto_pasar" class="col-sm-2 col-form-label"></label>';
                html += '<div class="col-sm-10 input-group">';
                html += '<input type="file" name="foto_pasar[]" accept=".png,.jpg" class="form-control filefoto" required>';
                html += '<div class="input-group-prepend">';
                html += '<button class="btn btn-danger deletefile" type="button"><i class="fas fa-times"></i>Remove</button>';
                html += '</div></div></div>';
    
                $('.fileadd').append(html);
            });
    
            $("body").on("click",".deletefile",function(){ 
                $(this).closest('#removefile').remove();
            });
    
            $('#provinsi').on('change', function(){
                $.ajax({
                    url : "{{url('location/getkabupaten')}}",
                    method : 'POST',
                    data : {'id':$(this).val(), '_token': "{{csrf_token()}}"},
                    success: function(res){
                        $('#kabupaten').empty();
                        $('#kecamatan').empty();
                        $.each(res, function(id, name){
                            $('#kabupaten').append(new Option(name, id));
                        });
                    }   
                });
            });
    
            $('#kabupaten').on('change', function(){
                $.ajax({
                    url : "{{url('location/getkecamatan')}}",
                    method : 'POST',
                    data : {'id':$(this).val(), '_token': "{{csrf_token()}}"},
                    success: function(res){
                        $('#kecamatan').empty();
                        $.each(res, function(id, name){
                            $('#kecamatan').append(new Option(name, id));
                        });
                    }   
                });
            });
    
        });
    </script>
    
@endsection
