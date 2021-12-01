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
                <h3 class="card-title">Contact Details Section</h3>

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
        
            
                    @if(!empty($totalcontactdetails))
                    <h1>{{$totalcontactdetails}} Records</h1>
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
                      <th scope="col">FontAwesome</th>
                      <th scope="col">Contact</th>
                      <th scope="col">Tag</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($contactsdetails))
                    <tr>
                    <td>{{$contactdetails->id}}</td>
                      <td>{{$contactdetails->fontawesome}}</td>
                      <td>{{$contactdetails->contact}}</td>
                      <td>{{$contactdetails->tag}}</td>
                      <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#contactDetailsEditModal{{$contactdetails->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contactDetailsDeleteModal{{$contactdetails->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                    <!--edit modal-->
                    <div class="modal fade" id="contactDetailsEditModal{{$contactdetails->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Content</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <Form method="POST" action="{{route('admin.editFinanceDepartmentData')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$contactdetails->id}}" hidden="true">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">FontAwesome</label>
                                        <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome" value="{{$contactdetails->fontawesome}}">
                                        @error('fontawesome')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Contact</label>
                                        <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{$contactdetails->contact}}">
                                        @error('contact')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Tag</label>
                                        <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{$contactdetails->tag}}">
                                        @error('tag')
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
                    <div class="modal fade" id="contactDetailsDeleteModal{{$contactdetails->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteFinanceDepartmentData')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$contactdetails->id}}" hidden="true">
                                
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
            <Form method="POST" action="{{route('admin.addFinanceDepartmentData')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="">FontAwesome</label>
                    <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome">
                    @error('fontawesome')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact">
                    @error('contact')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Tag</label>
                    <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag">
                    @error('tag')
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