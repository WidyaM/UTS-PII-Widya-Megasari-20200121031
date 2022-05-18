@extends('layouts.app')

@section('title', ' Edit Groups')

@section('content')
{{-- tampilan edit groups  --}}
<section id="edit" class="about">
  <div class="container">

    <div class="section-title">
      <h2 class="mt-5">Groups</h2>
      <h3>Edit <span>Groups</span></h3>
      
    </div>
    <div class="row content">
      <div class="d-flex flex-wrap justify-content-center">
          <div class="card m-3" style="width: 20rem;">
            <div class="card-body">
              {{-- mengambil data groups berdasarkan id  --}}
              <form action="/groups/{{ $groups['id'] }}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group m-3">
                <label for="exampleInputEmail1">Name</label>
                {{-- menampilkan nama yang akan di edit  --}}
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name') ? old('name') : $groups['name'] }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group m-3">
                <label for="description">Description</label>
                {{-- menampilkan Description yang akan di edit  --}}
                <input type="text" class="form-control" name="description" id="description" value="{{ old('description')? old('description') : $groups['description'] }}">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mt-5">
                {{-- button update --}}
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-outline-danger" href="/groups/#portfolio" role="button">Cancle</a>
              </div>
            </form>
            </div>

          </div>
        </div>
      </div>
  </div>
</section> 

    
@endsection