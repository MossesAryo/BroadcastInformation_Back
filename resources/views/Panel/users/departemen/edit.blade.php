@extends('layout.template')

@section('content')
<div class="container">
    <h2>Edit Departemen</h2>
    <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $departemen->nama }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $departemen->email }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $departemen->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection
