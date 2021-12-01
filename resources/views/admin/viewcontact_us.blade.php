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
                <h3 class="card-title">Contact Us Messages</h3>

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
        
            
                    @if(!empty($totalcontactus))
                    <h1>{{$totalcontactus}} Records</h1>
                    @endif
                        
                </div>
                </div>
            </div>
        </div>
              
            
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Message</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @if(!empty($contactus))
                    @foreach($contactus as $contactus)
                    <tr>
                    <td>{{$contactus->id}}</td>
                      <td>{{$contactus->name}}</td>
                      <td>{{$contactus->email}}</td>
                      <td>{{$contactus->subject}}</td>
                      <td>{{$contactus->message}}</td>
                      <td>

                      
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal{{$contactus->id}}">
                        <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    </tr>
                  

                    <!--delete modal-->
                    <div class="modal fade" id="DeleteModal{{$contactus->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteContact_Us')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$contactus->id}}" hidden="true">
                                
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
        
        
<!--end of messages section-->

        <!--martketing main section-->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Contact Details</h3>

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
                        
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#contactDetailsAddModal">
                          <i class="fa fa-plus"></i>Add
                        </button>
                        
                        @if(!empty($totalcontactdetails))
                        <h2>{{$totalcontactdetails}} Record</h2>
                        @else
                        <h2>No Record</h2>
                        @endif
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>FontAwesome</th>
                              <th>Contacts</th>
                              <th>Tags</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if(!empty($contactdetails))
                          @foreach($contactdetails as $contactdetails)
                            <tr>
                              <td>{{$contactdetails->id}}</td>
                              <td>{{$contactdetails->fontawesome}}</td>
                              <td>{{$contactdetails->contacts}}</td>
                              <td>{{$contactdetails->tags}}</td>
                              <td>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#contactDetailsUpdateModal{{$contactdetails->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contactDetailsDeleteModal{{$contactdetails->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                              </td>
                            </tr>

                            <!--edit modal for marketing main section-->
                            
                            <div class="modal fade" id="contactDetailsUpdateModal{{$contactdetails->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateContact_UsDetails')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$contactdetails->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">FontAwesome</label>
                                                <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome"  value="{{$contactdetails->fontawesome}}">
                                                @error('fontawesome')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Contacts</label>
                                                <input type="text" class="form-control @error('contacts') is-invalid @enderror" name="contacts"  value="{{$contactdetails->contacts}}">
                                                @error('contacts')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Tags</label>
                                                <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags"  value="{{$contactdetails->tags}}">
                                                @error('tags')
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

                            <div class="modal fade" id="contactDetailsDeleteModal{{$contactdetails->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Delete</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.deleteContact_UsDetails')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$contactdetails->id}}"  hidden="true">
                                            
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


        <div class="modal fade" id="contactDetailsAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addContact_UsDetails')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
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
                            <label for="">Contacts</label>
                            <input type="text" class="form-control @error('contacts') is-invalid @enderror" name="contacts">
                            @error('contacts')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Tags</label>
                            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags">
                            @error('tags')
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