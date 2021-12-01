
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


<!--messages section-->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Staffs Main Section</h3>

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
        
            
                    @if(!empty($totalstaffsmainsection))
                    <h2>{{$totalstaffsmainsection}} Records</h2>
                    @endif
                        
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staffsMainSectionAddModal">
                      <i class="fa fa-plus"></i>Add
                    </button>
                </div>
                </div>
            </div>
        </div>
              
            
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th scope="col">ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Staff's Name</th>
                      <th scope="col">Paragraph</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($staffsmainsectiondata))
                    @foreach($staffsmainsectiondata as $staffsmainsectiondata)
                    <tr>
                    <td>{{$staffsmainsectiondata->id}}</td>
                    <td>{{$staffsmainsectiondata->image}}</td>
                    <td>{{$staffsmainsectiondata->staff_name}}</td>
                    <td>{{$staffsmainsectiondata->paragraph}}</td>
                    <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#staffsMainSectionEditModal{{$staffsmainsectiondata->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staffsMainSectionDeleteModal{{$staffsmainsectiondata->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                  
                                  <!--edit modal for marketing main section-->
                                          
                                  <div class="modal fade" id="staffsMainSectionEditModal{{$staffsmainsectiondata->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update Record</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateStaffsMainSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$staffsmainsectiondata->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Image</label>
                                              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$staffsmainsectiondata->image}}">
                                              @error('image')
                                              <div class="alert alert-danger">{{$message}}</div>
                                              @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Staff's Name</label>
                                                <input type="text" class="form-control @error('staff_name') is-invalid @enderror" name="staff_name" value="{{$staffsmainsectiondata->staff_name}}">
                                                @error('staff_name')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Paragraph</label>
                                              <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                                {{$staffsmainsectiondata->paragraph}}
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
                                          <button type="submit" class="btn btn-success">Update</button>
                                        </div>

                                        </Form>
                                      </div>
                                    
                                  </div>

                            </div>
  
                            <!--end of of edit modal for marketing main section-->

                    <!--delete modal-->
                    <div class="modal fade" id="staffsMainSectionDeleteModal{{$staffsmainsectiondata->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteStaffsMainSection')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$staffsmainsectiondata->id}}" hidden="true">
                                
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

        <div class="modal fade" id="staffsMainSectionAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Content</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addStaffsMainSection')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
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
                            <label for="">Staff's Name</label>
                            <input type="text" class="form-control @error('staff_name') is-invalid @enderror" name="staff_name">
                            @error('staff_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="">Paragraph</label>
                          <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
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
        
        
<!--end of messages section-->

        <!--martketing main section-->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Staffs Row Section</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                      @if(!empty($totalstaffsrowsection))
                        <h2>{{$totalstaffsrowsection}} Record</h2>
                        @else
                        <h2>No Record</h2>
                        @endif
                        @if($totalstaffsrowsection < 4)
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staffsRowSectionAddModal">
                          <i class="fa fa-plus"></i>Add
                        </button>
                        @endif
                        
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>image</th>
                              <th>staff's Name</th>
                              <th>Paragraph</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if(!empty($staffsrowsection))
                          @foreach($staffsrowsection as $staffs)
                            <tr>
                              <td>{{$staffs->id}}</td>
                              <td>{{$staffs->image}}</td>
                              <td>{{$staffs->staff_name}}</td>
                              <td>{{$staffs->paragraph}}</td>
                              <td>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#staffsRowSectionUpdateModal{{$staffs->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staffsRowSectionDeleteModal{{$staffs->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                              </td>
                            </tr>

                            <!--edit modal for marketing main section-->
                            
                            <div class="modal fade" id="staffsRowSectionUpdateModal{{$staffs->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update Content</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateStaffsRowSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$staffs->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Image</label>
                                              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$staffs->image}}">
                                              @error('image')
                                              <div class="alert alert-danger">{{$message}}</div>
                                              @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Staff's Name</label>
                                                <input type="text" class="form-control @error('staff_name') is-invalid @enderror" name="staff_name" value="{{$staffs->staff_name}}">
                                                @error('staff_name')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Paragraph</label>
                                              <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                                {{$staffs->paragraph}}
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
                                          <button type="submit" class="btn btn-success">Update</button>
                                        </div>

                                        </Form>
                                      </div>
                                    
                                  </div>

                            </div>
  
                            <!--end of of edit modal for marketing main section-->

                            <!--delete modal for marketing main section-->

                            <div class="modal fade" id="staffsRowSectionDeleteModal{{$staffs->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Delete Record</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.deleteStaffsRowSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$staffs->id}}"  hidden="true">
                                            
                                            <p>Confirm You Want To Delete This Record</p>

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

                            <!--end of delete modal for marketing main section-->
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer"></div>
                    </div>
                  </div>
                </div>
              </div>



              <!-- /.card-body -->
            </div>
            <!-- /.card -->


        <div class="modal fade" id="staffsRowSectionAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Content</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addStaffsRowSection')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
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
                            <label for="">Staff's Name</label>
                            <input type="text" class="form-control @error('staff_name') is-invalid @enderror" name="staff_name">
                            @error('staff_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="">Paragraph</label>
                          <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
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
<!--end of marketing main section-->

</div>
              
              </div>
            
            </div>
          
      </div>
    
@endsection