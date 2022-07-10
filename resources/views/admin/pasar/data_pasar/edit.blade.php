@extends('admin/master-admin')
@section('content')
    @php use Illuminate\Support\Facades\DB; @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Pasar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/pasar') }}">Data Pasar</a></li>
                            <li class="breadcrumb-item active">Edit Data Pasar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        Edit Data Pasar
                    </div>
                    @foreach ($pasar as $p)
                        <form action="{{ url('admin/pasar/update') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id_pasar" value="{{ $p->id_pasar }}">
                            <div class="card-body">

                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Nama Pasar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_pasar" placeholder="Nama Pasar"
                                            required value="{{ $p->nama_pasar }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Pengelola Pasar</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" required name="id_pengelola"
                                            id="id_pengelola">
                                            <option selected value="">- PILIH PENGELOLA PASAR -</option>
                                            @foreach ($pengelola as $s)
                                                @if ($s->id_pengelola == $p->id_pengelola)
                                                    <option selected value="{{ $s->id_pengelola }}">-
                                                        {{ $s->nama_pengelola }}</option>
                                                @elseif(count(DB::table('pasar')->where('id_pengelola',
                                                    $s->id_pengelola)->get()) == 0)
                                                    <option value="{{ $s->id_pengelola }}">- {{ $s->nama }} /
                                                        {{ $s->jabatan }}</option>
                                                @endif
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
                                                @if ($id == $p->provinsi)
                                                    <option selected value="{{ $id }}">{{ $name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" required name="kabupaten" id="kabupaten">
                                            <option value=""> - PILIH KABUPATEN - </option>
                                            @foreach ($kabupaten as $id => $name)
                                                @if ($id == $p->kabupaten)
                                                    <option selected value="{{ $id }}">{{ $name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" required name="kecamatan" id="kecamatan">
                                            <option value=""> - PILIH KECAMATAN - </option>
                                            @foreach ($kecamatan as $id => $name)
                                                @if ($id == $p->kecamatan)
                                                    <option selected value="{{ $id }}">{{ $name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Maksimal Toko</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="max_toko"
                                            placeholder="Maksimal Toko" required value="{{ $p->max_toko }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Maksimal Pengunjung</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="max_pengunjung"
                                            placeholder="Maksimal Pengunjung" required value="{{ $p->max_pengunjung }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Alamat Pasar</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" cols="6" rows="4"
                                            placeholder="Alamat Lengkap Pasar" required>{{ $p->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Deskripsi Pasar</label>
                                    <div class="col-sm-10">
                                        <textarea name="deskripsi" class="form-control" cols="6" rows="4"
                                            placeholder="Deskripsi Pasar" required>{{ $p->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Lokasi Pasar</label>
                                    <div class="col-sm-10">
                                        <textarea name="embbed_maps" class="form-control" cols="6" rows="4"
                                            placeholder="Embedded Maps" required
                                            placeholder="Embedded Maps">{{ $p->embbed_maps }}</textarea>
                                        <small><a target="__BLANK" href="https://google-map-generator.com/">Info Lebih
                                                lanjut mengenai Embedded maps</a></small> <br>
                                        <iframe src="{{ $p->embbed_maps }}" style="border:0;" allowfullscreen=""
                                            loading="lazy"></iframe>
                                    </div>
                                </div>
                                <div class="mb-3 row control-group">
                                    <label for="foto_pasar" class="col-sm-2 col-form-label">Foto Pasar</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="file" name="foto_pasar[]" class="form-control filefoto"
                                                accept=".png,.jpg">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-success addfile" type="button"><i
                                                        class="fas fa-plus"></i> Add</button>
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

                                <div class="fileadd"></div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <ul class="list-group list-group-flush mt-2">
                                            @if ($p->foto_pasar != null)
                                                <li class="list-group-item text-bold">Foto Pasar</li>
                                                @php
                                                    $arr_foto_pasar = explode(',', $p->foto_pasar);
                                                @endphp
                                                @for ($i = 0; $i < count($arr_foto_pasar); $i++)
                                                    <li class="list-group-item">
                                                        <a title="Hapus" class="hapusfoto_pasar"
                                                            data-id="{{ $p->id_pasar }}" data-index="{{ $i }}"
                                                            data-foto_pasar="{{ $p->foto_pasar }}" data-toggle="tooltip"
                                                            href="#" style="color: red"><i class="fas fa-trash"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="{{ url('assets/admin/foto_pasar/' . $arr_foto_pasar[$i]) }}"
                                                            data-toggle="lightbox" data-title="{{ $p->nama_pasar }}"
                                                            data-gallery="gallery">
                                                            {{ $arr_foto_pasar[$i] }}
                                                        </a>
                                                    </li>
                                                @endfor
                                            @endif

                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary" style="float: right">Update</button>
                            </div>
                        </form>
                    @endforeach
                </div>

            </div>
        </section>
    </div>

    {{-- Notif Jika Data Pasar Berhasil Diedit --}}
    @if ($status = Session::get('success'))
        <script>
            swal("{{ $status }}")
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('.addfile').click(function() {
                var html = '';
                html += '<div class="mb-3 row control-group" id="removefile">';
                html += '<label for="nis" class="col-sm-2 col-form-label"></label>';
                html += '<div class="col-sm-10 input-group">';
                html +=
                    '<input type="file" name="foto_pasar[]" accept=".png,.jpg" class="form-control filefoto">';
                html += '<div class="input-group-prepend">';
                html +=
                    '<button class="btn btn-danger deletefile" type="button"><i class="fas fa-times"></i> Remove</button>';
                html += '</div></div></div>';

                $('.fileadd').append(html);
            });

            $("body").on("click", ".deletefile", function() {
                $(this).closest('#removefile').remove();
            });

            //hapus foto_pasar
            $('.hapusfoto_pasar').click(function(e) {

                e.preventDefault();

                var confirmed = confirm('Hapus foto pasar ini ?');

                if (confirmed) {

                    $.ajax({
                        data: {
                            'id_pasar': $(this).data('id'),
                            '_token': "{{ csrf_token() }}",
                            'foto_pasar': $(this).data('foto_pasar'),
                            'index': $(this).data('index')
                        },
                        type: 'POST',
                        url: "{{ url('admin/pasar/hapusfoto') }}",
                        success: function(data) {
                            swal(data.pesan)
                                .then((result) => {
                                    location.reload();
                                });
                        },
                        error: function(err) {
                            alert(err);
                            console.log(err);
                        }
                    });

                }

            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('#provinsi').on('change', function() {
                $.ajax({
                    url: "{{ url('location/getkabupaten') }}",
                    method: 'POST',
                    data: {
                        'id': $(this).val(),
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        $('#kabupaten').empty();
                        $('#kecamatan').empty();
                        $.each(res, function(id, name) {
                            $('#kabupaten').append(new Option(name, id));
                        });
                    }
                });
            });

            $('#kabupaten').on('change', function() {
                $.ajax({
                    url: "{{ url('location/getkecamatan') }}",
                    method: 'POST',
                    data: {
                        'id': $(this).val(),
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        $('#kecamatan').empty();
                        $.each(res, function(id, name) {
                            $('#kecamatan').append(new Option(name, id));
                        });
                    }
                });
            });

        });
    </script>

@endsection
