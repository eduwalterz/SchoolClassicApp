
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
                <h3 class="card-title">Accomplishment-First Section</h3>

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
        
            
                    @if(!empty($totalaccomplishmentfirstsection))
                    <h2>{{$totalaccomplishmentfirstsection}} Records</h2>
                    @endif
                        
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accomplishmentfirstSectionAddModal">
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
                    <th scope="col">Heading</th>
                      <th scope="col">Image</th>
                      <th scope="col">Paragraph</th>
                      <th scope="col">Fontawesome</th>
                      <th scope="col">Dates</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($accomplishmentfirstsection))
                    @foreach($accomplishmentfirstsection as $accomplishment)
                    <tr>
                    <td>{{$accomplishment->id}}</td>
                    <td>{{$accomplishment->heading}}</td>
                    <td>{{$accomplishment->image}}</td>
                    <td>{{$accomplishment->paragraph}}</td>
                    <td>{{$accomplishment->fontawesome}}</td>
                    <td>{{$accomplishment->dates}}</td>
                    <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#accomplishmentFirstSectionEditModal{{$accomplishment->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#accomplishmentFirstSectionDeleteModal{{$accomplishment->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                  
                                  <!--edit modal for marketing main section-->
                                          
                                  <div class="modal fade" id="accomplishmentFirstSectionEditModal{{$accomplishment->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update Record</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateAccomplishmentFirstSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$accomplishment->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Heading</label>
                                                <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{$accomplishment->heading}}">
                                                @error('heading')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Image</label>
                                              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$accomplishment->image}}">
                                              @error('image')
                                              <div class="alert alert-danger">{{$message}}</div>
                                              @enderror
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Paragraph</label>
                                              <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                                {{$accomplishment->paragraph}}
                                              </textarea>
                                                @error('paragraph')
                                              <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Fontawesome</label>
                                                <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome" value="{{$accomplishment->fontawesome}}">
                                                @error('fontawesome')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Dates</label>
                                                <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates" value="{{$accomplishment->dates}}">
                                                @error('dates')
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
                    <div class="modal fade" id="accomplishmentFirstSectionDeleteModal{{$accomplishment->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteAccomplishmentFirstSection')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$accomplishment->id}}" hidden="true">
                                
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

        <div class="modal fade" id="accomplishmentfirstSectionAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Content</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addAccomplishmentFirstSection')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading">
                            @error('heading')
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
                          <label for="">Paragraph</label>
                          <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                          </textarea>
                            @error('paragraph')
                          <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Fontawesome</label>
                            <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome">
                            @error('fontawesome')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Dates</label>
                            <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates">
                            @error('dates')
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
                <h3 class="card-title">Accomplishment-Second Section</h3>

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
                      @if(!empty($totalaccomplishmentsecondsection))
                        <h2>{{$totalaccomplishmentsecondsection}} Record</h2>
                        @else
                        <h2>No Record</h2>
                        @endif
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accomplishmentSecondSectionAddModal">
                          <i class="fa fa-plus"></i>Add
                        </button>
                        
                        
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover nowrap">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Heading</th>
                              <th scope="col">Paragraph</th>
                              <th scope="col">image</th>
                              <th scope="col">Fontawesome</th>
                              <th scope="col">Dates</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if(!empty($accomplishmentsecondsection))
                          @foreach($accomplishmentsecondsection as $accomplishmentsecond)
                            <tr>
                              <td>{{$accomplishmentsecond->id}}</td>
                              <td>{{$accomplishmentsecond->heading}}</td>
                              <td>{{$accomplishmentsecond->paragraph}}</td>
                              <td>{{$accomplishmentsecond->image}}</td>
                              <td>{{$accomplishmentsecond->fontawesome}}</td>
                              <td>{{$accomplishmentsecond->dates}}</td>
                              <td>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#accomplishmentSecondSectionUpdateModal{{$accomplishmentsecond->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#accomplishmentSecondSectionDeleteModal{{$accomplishmentsecond->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                              </td>
                            </tr>

                            <!--edit modal for marketing main section-->
                            
                            <div class="modal fade" id="accomplishmentSecondSectionUpdateModal{{$accomplishmentsecond->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update Content</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateAccomplishmentSecondSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$accomplishmentsecond->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Heading</label>
                                                <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{$accomplishmentsecond->heading}}">
                                                @error('heading')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Paragraph</label>
                                              <textarea name="paragraph" class="form-control @error('paragraph') is-invalid @enderror" cols="30" >
                                                {{$accomplishmentsecond->paragraph}}
                                              </textarea>
                                                @error('paragraph')
                                              <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="">Image</label>
                                              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$accomplishmentsecond->image}}">
                                              @error('image')
                                              <div class="alert alert-danger">{{$message}}</div>
                                              @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Fontawesome</label>
                                                <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome" value="{{$accomplishmentsecond->fontawesome}}">
                                                @error('fontawesome')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Dates</label>
                                                <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates" value="{{$accomplishmentsecond->dates}}">
                                                @error('dates')
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

                            <div class="modal fade" id="accomplishmentSecondSectionDeleteModal{{$accomplishmentsecond->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Delete Record</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.deleteAccomplishmentSecondSection')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$accomplishmentsecond->id}}"  hidden="true">
                                            
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


        <div class="modal fade" id="accomplishmentSecondSectionAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Content</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addAccomplishmentSecondSection')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading">
                            @error('heading')
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
                            <label for="">Fontawesome</label>
                            <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome">
                            @error('fontawesome')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Dates</label>
                            <input type="text" class="form-control @error('dates') is-invalid @enderror" name="dates">
                            @error('dates')
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