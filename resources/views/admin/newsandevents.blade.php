@extends('layouts.backend')
@section('content')

@if(session('success'))
<div class="alert alert-success" id="successMessage">
  {{session('success')}}
</div>
@endif


<script>
  /*$("#successMessage").fadeOut.hide(1000);*/
  setTimeout(
    function(){
    $("#successMessage").delay(3000).fadeOut('fast');
  },1000
    );
    </script>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">News and Events Section</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                
              </div>
             
            <div class="card-body">
           
        <div class="row" >
          <div class="col-12" >
            <div class="card" >
              <div class="card-header" >
                <div class="col-md-12"style="display: inline-block;" >
        
            
                    @if(!empty($totalnewsandevents))
                    <h1>{{$totalnewsandevents}} Records</h1>
                    @endif
                @if($totalnewsandevents < 3)
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Add
                    </button>

                @endif
        
                        <div class=" float-right " style="display: inline-block;" >
                      
                          <form  class="form-inline my-2 my-log-0" type="get" action="{{route('admin.search')}}">
                          <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            <input class="form-control mr-sm-2 " name="query"  type="search" placeholder="Search">
                              <div class="input-group-append">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          
                          </form>
                     
                </div>
              </div>
  </div>
  </div>
  </div>
              
            
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th scope="col">ID</th>
                      <th scope="col">Main Heading</th>
                      <th scope="col">Image</th>
                      <th scope="col">Sub Heading</th>
                      <th scope="col">Dates</th>
                      <th scope="col">Paragraph</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($newsandevents))
                    @foreach($newsandevents as $newsandevents)
                    <tr>
                    <td>{{$newsandevents->id}}</td>
                    <td>{{$newsandevents->main_heading}}</td>
                      <td><img src="{{asset('images/'.$newsandevents->image)}}" style="width:25px; height: 25px;" class="img-circle"></td>
                      <td>{{$newsandevents->sub_heading}}</td>
                      <td>{{$newsandevents->dates}}</td>
                      <td>{{$newsandevents->paragraph}}</td>
                      <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#newsAndEventsEditModal{{$newsandevents->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#newsandeventsDeleteModal{{$newsandevents->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                    <!--edit modal-->
                    <div class="modal fade" id="newsAndEventsEditModal{{$newsandevents->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Content</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <Form method="POST" action="{{route('admin.editNewsandEventsData')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$newsandevents->id}}" hidden="true">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Main Heading</label>
                                        <input type="text" class="form-control @error('main_heading') is-invalid @enderror" name="main_heading" value="{{$newsandevents->main_heading}}">
                                        @error('main_heading')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$newsandevents->image}}">
                                        @error('image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Dates</label>
                                        <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates" value="{{$newsandevents->dates}}">
                                        @error('dates')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Sub Heading</label>
                                        <input type="text" class="form-control @error('sub_heading') is-invalid @enderror" name="sub_heading" value="{{$newsandevents->sub_heading}}">
                                        @error('sub_heading')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Paragraph</label>
                                        <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                          {{$newsandevents->paragraph}}
                                        </textarea>
                                        @error('paragraph')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                  
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save</button>
                            </div>

                            </Form>
                          </div>
                        
                        </div>
        
                    </div>
                    <!--end of edit modal-->

                    <!--delete modal-->
                    <div class="modal fade" id="newsandeventsDeleteModal{{$newsandevents->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteNewsandEventsData')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$newsandevents->id}}" hidden="true">
                                
                                <div class="col-md-12">
                                  <p>Confirm You Want to Delete This Record!</p>
                                </div>
                                
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Delete</button>
                            </div>

                            </Form>
                          </div>
                        
                        </div>
        
                    </div>
                    <!--end of delete modal-->
                    @endforeach
                    @endif
                    
                  </tbody>
                  
                </table>
                
              </div>
            
            </div>
     
          </div>
        </div>
        
              </div>
              
            </div>
          
          </div>
        
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Content</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <Form method="POST" action="{{route('admin.addNewsandEventsData')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Main Heading</label>
                    <input type="text" class="form-control @error('main_heading') is-invalid @enderror" name="main_heading">
                    @error('main_heading')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates">
                    @error('dates')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Sub Heading</label>
                    <input type="text" class="form-control @error('sub_heading') is-invalid @enderror" name="sub_heading">
                    @error('sub_heading')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Paragraph</label>
                    <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" ></textarea>
                    @error('paragraph')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>

            </Form>
          </div>
         
      </div>
        
    </div>
    
@endsection