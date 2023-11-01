@extends('layouts.admin_app')

@section('content')

<div id="mytask-layout" class="theme-indigo">
@include('layouts.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4"> 
    @include('layouts.header')

        <!-- Body: Body -->       
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">{{$title}}</h3>

                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                            
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th> 
                                            <th>Category</th> 
                                            <th>Created Date</th> 
                                            <th>Actions</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                          
                                    @if(!empty($posts))
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                #{{$post->id}}
                                            </td>
                                            
                                           <td>
                                               <span class="fw-bold ms-1">{{$post->title}}</span>
                                           </td>
                                           <td>
                                                {{$post->category}}
                                           </td>
                                           <td><span class="badge bg-warning">{{$post->created_at}}</span></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <a href="/admin/feedback-detail/{{ $post->id }}" class="btn btn-outline-secondary"><i class="icofont-ui-copy text-success"></i></a>
                                                    <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>
        
    </div>
</div>
 
@endsection
