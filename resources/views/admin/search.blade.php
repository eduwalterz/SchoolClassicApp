@extends('layouts.backend')
@section('content')
<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image Name</th>
                      <th>Image</th>
                      <th>Status</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($images as $image)
                    <tr>
                      <td>{{$image->id}}</td>
                      <td>{{$image->image_name}}</td>
                      <td>
                        <img src="{{asset('images/'.$image->image)}}" style="width:25px; height: 25px;" class="img-circle">
                      </td>
                      <td><span class="tag tag-success"></span>
                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$image->id}}">
                        <i class="fa fa-edit"></i>Edit
                      </button>
                      
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$image->id}}">
                      <i class="fa fa-trash"></i>Delete
                      </button>
                      </td>
                    
                    </tr>
                    <!--edit modal-->
                    <div class="modal fade" id="editModal{{$image->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update: {{$image->image_name}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.editCarausel')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$image->id}}" hidden="true">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="">Image Name</label>
                                    <input type="text" class="form-control @error('image_name') is-invalid @enderror" name="image_name" value="{{$image->image_name}}">
                                    @error('image_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <img src="{{asset('images/'.$image->image)}}" alt="" style="width:80px; height:80px">
                                </div>
                                <div class="col-md-12">
                                  <label for="">Image</label>
                                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                  @error('image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
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
                    <div class="modal fade" id="deleteModal{{$image->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete: {{$image->image_name}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <Form method="POST" action="{{route('admin.deleteCarausel')}}">
                            @csrf
                            <div class="modal-body">
                              <div class="row">
                                <input type="text" name="id" value="{{$image->id}}" hidden="true">
                                
                                <div class="col-md-12">
                                  <p>Confirm You Want to Delete This Image?</p>
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
                  </tbody>
                </table>
@endsection