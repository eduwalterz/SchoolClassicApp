@extends('layouts.backend')
@section('content')
<!--marketing Row Section-->

<div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">History-Mission-Vission Section</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                  @if(!empty($totalhistorymissionvissionData))
                    <h3 class="card-title">{{$totalhistorymissionvissionData}} Records</h3>
                    @else
                    <h3 class="card-title">0 Records</h3>
                  @endif

                  <br>
                  @if($totalhistorymissionvissionData < 3)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#marketingRowModal">
                  <i class="fa fa-plus"></i>Add
                </button>
                  @endif
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="marketingrowsearch" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                  
                    <tr>
                      
                      <th class="col-md-1">ID</th>
                      <th class="col-md-3">Fontawesome</th>
                      <th class="col-md-2">Heading</th>
                      <th class="col-md-4">Paragraph</th>
                      <th class="col-md-2">Action</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                  @if(!empty($historymissionvissiondata))
                  @foreach($historymissionvissiondata as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->fontawesome}}</td>
                      <td>{{$data->heading}}</td>
                      <td>{{$data->paragraph}}</td>
                      <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#historymissionmissionEditModal{{$data->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#historymissionvissionDeleteModal{{$data->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                      </td>
                    </tr>

                    <!--edit modal for marketing row section-->

                    <div class="modal fade" id="historymissionmissionEditModal{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Content</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="{{route('admin.updateHistoryMissionVission')}}"  enctype="multipart/form-data">
                              @csrf
                            <div class="modal-body">
                              

                            <div class="row">
                            <input type="text" name="id" value="{{$data->id}}"  hidden="true">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Fontawesome</label>
                                        <input type="text" class="form-control @error('fontawesome') is-invalid @enderror" name="fontawesome" value="{{$data->fontawesome}}">
                                        @error('fontawesome')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="">Heading</label>
                                      <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{$data->heading}}">
                                      @error('Heading')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                  </div>
                                  
                                  
                                    <div class="col-md-12">
                                      <label for="">Paragraph</label>
                                      <textarea class="form-control @error('paragraph') is-invalid @enderror" name="paragraph">
                                      {{$data->paragraph}}
                                      </textarea>
                                      @error('paragraph')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                  </div>


                            
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Update</button>
                            </div>
                            </form>
                          </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!--end of edit for marketing row section-->

                     <!--delete modal for marketing row section-->

                        <div class="modal fade" id="historymissionvissionDeleteModal{{$data->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Delete Record</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <Form method="post" action="{{route('admin.deleteHistoryMissionVission')}}">
                                            @csrf
                                            <div class="modal-body">
                                              <div class="row">
                                                <input type="text" name="id" value="{{$data->id}}"  hidden="true">
                                                
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

                      <!--end of delete modal for marketing row section-->

                  @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row --> 



        <!--add modal marketing row section-->

        <div class="modal fade" id="marketingRowModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add content</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{route('admin.addHistoryMissionVission')}}">
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
                          <label for="">Heading</label>
                          <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading">
                          @error('heading')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                      </div>
                      
                      
                        <div class="col-md-12">
                          <label for="">Paragraph</label>
                          <textarea class="form-control @error('paragraph') is-invalid @enderror" name="paragraph">
                            
                          </textarea>
                          @error('paragraph')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                      </div>


                
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
              </div>
              </div>
              <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- end of add modal for marketing row section-->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
        </div>
      </div>
      </div>
<!--end of marketing Row Section-->
@endsection