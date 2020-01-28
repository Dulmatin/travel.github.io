@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
</div>


@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>

@endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('travel-package.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title`">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" placeholder="Location" class="form-control" value="{{old('location')}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="30" rows="10" class="d-block w-100 form-control">{{old('about')}}</textarea>
                </div>
                 <div class="form-group">
                    <label for="featured_event">Featured Event</label>
                    <input type="text" name="featured_event" id="featured_event" placeholder="Featured Event" class="form-control" value="{{old('featured_event')}}">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" name="language" id="language" placeholder="Language" class="form-control" value="{{old('location')}}">
                </div>
                <div class="form-group">
                    <label for="foods">Foods</label>
                    <input type="text" name="foods" id="location" placeholder="Foods" class="form-control" value="{{old('foods')}}">
                </div>
                <div class="form-group">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" name="departure_date" id="departure_date" placeholder="Departure Date" class="form-control" value="{{old('departure_date')}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" id="duration" placeholder="Duration" class="form-control" value="{{old('duration')}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" placeholder="Type" class="form-control" value="{{old('type')}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" class="form-control" value="{{old('price')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
<!-- /.container-fluid -->

@endsection

