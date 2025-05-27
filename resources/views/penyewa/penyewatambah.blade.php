@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Tambah Data Penyewa Kamar Kos <strong>TAMBAH DATA</strong>
                </div>
                
                <div class="card-body">
                    <a href="/penyewa" class="btn btn-sm btn-outline-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/penyewa/simpan">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Penyewa</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Penyewa ...">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        </br>

                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email Penyewa ...">
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
                        </div>
                        </br>
                        
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon ...">
                            @if($errors->has('no_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('no_telp')}}
                                </div>
                            @endif
                        </div>
                        </br>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat ...">
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