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


<!--carausel section-->
<div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">BigData Department</h3>

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
        
            
                    @if(!empty($totalbigdatadepartment))
                    <h1>{{$totalbigdatadepartment}} Records</h1>
                    @endif
                
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Add
                    </button>

                  
        
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
                      <th scope="col">Paragraph</th>
                      <th scope="col">Owner</th>
                      <th scope="col">Owner's Title</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($bigdatadepartment))
                    <tr>
                    <td>{{$bigdatadepartment->id}}</td>
                      <td>{{$bigdatadepartment->main_heading}}</td>
                      <td><img src="{{asset('images/'.$bigdatadepartment->image)}}" style="width:25px; height: 25px;" class="img-circle"></td>
                      <td>{{$bigdatadepartment->sub_heading}}</td>
                      <td>{{$bigdatadepartment->paragraph}}</td>
                      <td>{{$bigdatadepartment->owner}}</td>
                      <td>{{$bigdatadepartment->owner_title}}</td>
                      <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#bigdataDepartmentEditModal{{$bigdatadepartment->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#bigdataDepartmentDeleteModal{{$bigdatadepartment->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                    <!--edit modal-->
                    <div class="modal fade" id="bigdataDepartmentEditModal{{$bigdatadepartment->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Content</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <Form method="POST" action="{{route('admin.editBigdataDepartmentData')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$bigdatadepartment->id}}" hidden="true">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Main Heading</label>
                                        <input type="text" class="form-control @error('main_heading') is-invalid @enderror" name="main_heading" value="{{$bigdatadepartment->main_heading}}">
                                        @error('main_heading')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$bigdatadepartment->image}}">
                                        @error('image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Sub Heading</label>
                                        <input type="text" class="form-control @error('sub_heading') is-invalid @enderror" name="sub_heading" value="{{$bigdatadepartment->sub_heading}}">
                                        @error('sub_heading')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Paragraph</label>
                                        <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                          {{$bigdatadepartment->paragraph}}
                                        </textarea>
                                        @error('paragraph')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Owner</label>
                                        <input type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{$bigdatadepartment->owner}}">
                                        @error('owner')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Owner's Title</label>
                                        <input type="text" class="form-control @error('owner_title') is-invalid @enderror" name="owner_title" value="{{$bigdatadepartment->owner_title}}">
                                        @error('owner_title')
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
                    <div class="modal fade" id="bigdataDepartmentDeleteModal{{$bigdatadepartment->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteBigdataDepartmentData')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$bigdatadepartment->id}}" hidden="true">
                                
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
            <Form method="POST" action="{{route('admin.addBigdataDepartmentData')}}" enctype="multipart/form-data">
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Owner</label>
                    <input type="text" class="form-control @error('owner') is-invalid @enderror" name="owner">
                    @error('owner')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Owner's Title</label>
                    <input type="text" class="form-control @error('owner_title') is-invalid @enderror" name="owner_title">
                    @error('owner_title')
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