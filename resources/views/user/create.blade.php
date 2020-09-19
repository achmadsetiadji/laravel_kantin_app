@extends('layouts/main')

@section('title', 'Add Users Data')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Add Users</h6>
        </div>
        <div class="card-body">
            <form class=" form-signin" action="/user" method="POST">
                @csrf

                <div class="form-group">
                    <label for="level">Level</label>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control @error('level') is-invalid @enderror" id="level"
                        placeholder="Masukan Level" name="level" value="{{ old('level') }}">
                            <option selected>Choose...</option>
                            <option value="admin">admin</option>
                            <option value="waiter">waiter</option>
                            <option value="kasir">kasir</option>
                            <option value="owner">owner</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Masukan Nama" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Masukan Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Masukan Password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button style="width: 15%;" class="btn btn-small btn-success btn-block" type="submit"><i
                        class="far fa-save"></i><span class="ml-2">save changes</span></button>
            </form>
        </div>
    </div>
    <a href="/user" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- /.container-fluid -->
@endsection
