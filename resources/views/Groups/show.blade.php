@extends('layouts.app')

@section('title', 'Coba')

@section('content')

{{-- tampilan detail --}}
<section id="show" class="about">
    <div class="container">
  
      <div class="section-title d-flex flex-wrap justify-content-center">
        <h3 class="mt-5">Detail <span class="text-primary">Groups</span></h3>
      </div>
      <div class="row content">
        <div class="d-flex flex-wrap justify-content-center">
          <div class="card my-4 border-primary" style="width: auto;">
            <div class="card-body my-2">
              {{-- tombol back  --}}
                  <a class="btn btn-outline-primary" href="/groups/#portfolio" role="button">< Back</a>
                  {{-- menampilkan nama --}}
                  <h3 class="card-title my-2"> Name : {{ $group['name'] }} </h3>
                  {{-- menampilkan description --}}
                  <h5 class="card-subtitle my-2"> Description : {{ $group['description'] }} </h5>
                  <hr>
                  <div class="">
                    <div class="my-2">
                      @php
                          $id = $group['id'];
                          $count = DB::table('friends')->where('groups_id','=',$id)->count();
                          $all = DB::table('history_friends')->where('groups_id','=',$id)->count();
                          
                      @endphp
                      {{-- menampilkan jumlah data-data member yang ada --}}
                      <div class="d-flex flex-wrap justify-content-center">
                        <div class="card border-primary m-1" style="width: 5rem; height: auto;">
                          <h5 class="text-center"> Member<br><hr class="m-1">@php echo $count; @endphp</h5>
                        </div>
  
                        <div class="card border-primary m-1" style="width: 5rem; height: auto;">
                          <h5 class="text-center">In <br><hr class="m-1">@php echo $all; @endphp</h5>
                        </div>
  
                        <div class="card border-primary m-1" style="width: 5rem; height: auto;">
                          <h5 class="text-center">Out <br> <hr class="m-1">@php echo $all - $count; @endphp </h5>
                        </div>

                      </div>
                    </div>

                    {{-- list member--}}
                        
                        <div>
                          <h5><b>Member List</b></h5>
                          <a class="btn btn-outline-primary" href="/groups/addmember/{{ $group['id'] }}/#add" role="button">New Member</a>
                          <div style="width: 16rem;height: 200px;" class="overflow-auto mt-2 ">
                            <ul class="list-group ">
                              @foreach ($group->friends as $friend)
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{-- menampilkan nama member  --}}
                                <h5>{{$friend->nama}}</h5>
                                <span class="">
                                  <form action="/groups/deletemember/{{$friend->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-danger m-2 d-flex " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')">X</button>
                                  </form>
                                </span>
                              </li>
                              @endforeach
                            </ul>
                            
                          </div>        
                        </div>
                        
                      <hr>
                    {{-- end list --}}

                  </div>
                </div>
            </div>
            
          </div>
        </div>
    </div>
</section> 


    
    
    
@endsection


