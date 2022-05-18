@extends('layouts.app')

@section('title', 'Friends')

@section('content')

<!-- Start tampilan semua data friends -->
  <section class="py-5 mb-5">
    <div class="container">
      <div class="section-title d-flex justify-content-center">  
        <div class="">
          <h2 class="m-auto h2 semi-bold-600 py-2"><span class="text-primary">Friends</span> List</h2>
          <a class="btn btn-outline-primary col-lg-12 text-center " href="#" role="button" data-bs-toggle="modal" data-bs-target="#createModal">Create Friend</a>
        </div>
      </div>
      <div class="text-start mt-5">
        @php
          $count = DB::table('friends')->count();
          $price = DB::table('history_friends')->max('id');
        @endphp
        <div class="mx-5">
          <h6 class="text-muted">
            {{-- menampilkan jumlah data-data friends --}}
            <i> Friends : </i>@php echo $count @endphp
            <i>| Friends Created : </i>@php echo $price @endphp
            <i>| Deleted        : </i>@php echo $price - $count @endphp
          </h6>
        </div>
      </div>
    
      
        <div class="row content">
            <div class="d-flex flex-wrap justify-content-center">
              {{-- menampilkan daftar friends --}}
              @foreach ($friends as $friend)
              <div class="card m-3 border-primary" style="width: 15rem;">
                <div class="card-body">
                  <div class="d-flex flex-wrap mt-3">
                    <div style="width: 9rem;">
                      <a class="text-decoration-none" href="/friends/{{ $friend['id'] }}/#show" title="Klik Untuk Melihat">
                        {{-- menampilkan nama --}}
                        <h3 class="card-title text-uppercase">{{ $friend['nama'] }}</h3>
                        
                        {{-- menampilkan no_tlp --}}
                        <h6 class="card-subtitle mb-2 text-muted">No Tlp : {{ $friend['no_tlp'] }}</h6>
                        {{-- menampilkan alamat --}}
                        <p class="card-text text-muted">Address : {{ $friend['alamat'] }}</p>
                        </p>   
                      </a>
                    </div>
                    <div class="">
                      {{-- tombol edit dan delete --}}
                      <a class="btn btn-outline-success m-2 d-flex justify-content-center" title="Edit" href="/friends/{{ $friend['id'] }}/edit/#edit" role="button" ><i class="bi bi-pencil"></i></a>
                      <form action="/friends/{{$friend['id']}}/#about" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger m-2 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
                      </form>
                    </div>
                  </div>
                  

                  

                </div>
              </div>

              @endforeach

            </div>

            {{-- create MODAL// tampilan unutk menambahkan friends --}}
              <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Friend</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/friends/#about" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          {{-- form input nama  --}}
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" required value="{{ old('nama') }}">
                          @error('nama')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          {{-- form input no_tlp  --}}
                          <label for="exampleInputPassword1" class="form-label">No Telpon</label>
                          <input type="number" class="form-control" name="no_tlp" id="exampleInputPassword1" required value="{{ old('no_tlp') }}">
                          @error('no_tlp')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          {{-- form input alamat  --}}
                          <label for="exampleInputPassword1" class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" required value="{{ old('alamat') }}">
                          @error('alamat')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        
                        <div class="modal-footer">
                          {{-- tombol  --}}
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a class="btn btn-outline-danger" role="button" data-bs-dismiss="modal">Cancle</a>
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
    </div>
  </section>      
      <!-- End Recent Work -->      
@endsection