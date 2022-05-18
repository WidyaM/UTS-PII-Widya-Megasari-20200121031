@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<!-- ======= friends Section ======= -->
<section id="portfolio" class="about">
  <div class="container">

    <div class="section-title d-flex justify-content-center">  
      <div class="">
        <h2 class="mt-5 h2 semi-bold-600 py-2"><span class="text-primary">Groups</span> List</h2>
        <a class="btn btn-outline-primary col-lg-12 text-center " href="#" role="button" data-bs-toggle="modal" data-bs-target="#createModal">Create Group</a>
      </div>
    </div>
      <div class="text-start mt-5">
        @php
          $count = DB::table('groups')->count();
          $price = DB::table('history_groups')->max('id');
        @endphp
        <div class="">
          <h6 class="text-muted">
            {{-- menampilkan jumlah data group yang ada --}}
            <i> Groups : </i>@php echo $count @endphp
            <i>| Groups Created : </i>@php echo $price @endphp
            <i>| Deleted Groups: </i>@php echo $price - $count @endphp
          </h6>
        </div>
      </div>
  </div>

    <div class="row content">
        <div class="d-flex flex-wrap justify-content-center ">

          @foreach ($groups as $group)

          <div class="card m-3 border-primary" style="width: 18rem;">
            <div class="card-body">
              <div class="d-flex flex-wrap justify-content-between">
                <a class="text-decoration-none" href="/groups/{{ $group['id'] }}/#show">
                  <div style="width: 12rem;">
                    {{-- menampilkan nama groups --}}
                    <h3 class="card-title">{{ $group['name'] }}</h3>
                    {{-- menampilkan  description --}}
                    <h5 class="card-subtitle mb-2 text-muted">{{ $group['description'] }}</h5>
                  </div>
                </a>
                <div >
                  <a class="btn btn-outline-success m-2 d-flex justify-content-center" href="/groups/{{ $group['id'] }}/edit/#edit" title="Edit" role="button"><i class="bi bi-pencil"></i></a>
                  <form action="/groups/{{$group['id']}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger m-2 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                  </form>
                </div>
              </div>

              {{-- list member groups--}}
              <hr>
              <h5><b>Member List</b></h5>
              <a class="btn btn-outline-primary mb-2" href="/groups/addmember/{{ $group['id'] }}/#add" role="button">New Member</a>
              <div>
                <ul class="list-group ">
                  @foreach ($group->friends as $friend)
                  <li class="list-group-item border-dark d-flex justify-content-between align-items-center">
                    {{-- menampilkan nama memeber dari groups --}}
                    <h5>{{$friend->nama}}</h5>
                    <span class="">
                      <form action="/groups/deletemember/{{$friend->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-danger d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')">X</button>
                      </form>
                    </span>
                  </li>
                  @endforeach
                </ul>
                
              </div>      
          {{-- end list --}}

              

            </div>
          </div>

          @endforeach

        </div>
        {{-- create MODAL // tampilan memebuat groups--}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Friend</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/groups/#portfolio" method="POST">
                  @csrf
                  <div class="form-group">
                    
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    {{-- input nama groups --}}
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" required value="{{ old('nama') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    {{-- input Description groups --}}
                    <input type="text" class="form-control" name="description" id="exampleInputPassword1" required value="{{ old('description') }}">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="modal-footer mt-3">
                    {{-- tombol submit  --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close" role="button">Cancel</a>
                  </div>
                </form>

                
              </div>
              
            </div>
          </div>
        </div>
      {{-- endModal --}}
      </div>
    </div>
  </div>
</section><!-- End About Section -->

@endsection