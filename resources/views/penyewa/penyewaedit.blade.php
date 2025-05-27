@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Penyewa - <strong>EDIT DATA</strong>
                </div>

                <div class="card-body">
                    <a href="/penyewa" class="btn btn-sm btn-outline-primary">Kembali</a>
                    <br/>
                    <br/>
                    <form action="{{ route('penyewaupdate', ['idpenyewa' => $penyewa->id_penyewa]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama Penyewa</label>
                            <input type="text" name="name" class="form-control" value="{{ $penyewa->name }}" placeholder="Nama Penyewa ...">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $penyewa->email }}" placeholder="Email ...">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ $penyewa->no_telp }}" placeholder="Nomor Telepon ...">
                            @if($errors->has('no_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_telp')}}
                                </div>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat ...">{{ $penyewa->alamat }}</textarea>
                            @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="submit" class="btn simpan" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection