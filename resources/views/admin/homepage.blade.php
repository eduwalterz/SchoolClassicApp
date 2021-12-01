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
                <h3 class="card-title">Home Page Carousel</h3>

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
        
            
                    @if(!empty($total))
                    <h1>{{$total}} Records</h1>
                    @endif
                
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Add
                    </button>

                    <!--<div class=" float-right" style="display: inline-block;" >-->
                  <div class=" float-right col-md-7">
                    <a href="{{route('admin.downloadExcel')}}"  >
                            <button type="button" class="btn btn-sm btn-secondary">
                            <i class="fas fa-download"></i>DownloadExcel
                            </button>
                        </a>

                    <a href="{{route('admin.downloadCSV')}}"  >
                            <button type="button" class="btn btn-sm btn-default">
                            <i class="fas fa-download"></i>DownloadCSV
                            </button>
                        </a>
                      
                
                        <a href="{{route('admin.download-pdf')}}"  >
                            <button type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i>DownloadPDF
                            </button>
                        </a>
        
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
              
        
              <!-- <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="search" name="query" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>-->

              <Center> 
            
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-md-2">ID</th>
                      <th class="col-md-3">Image Name</th>
                      <th class="col-md-3">Image</th>
                      <th class="col-md-4">Action</th>
                      
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

                      <a href="{{asset('images/'.$image->image)}}" download="{{$image->image}}">
                                <button type="button" class="btn btn-sm btn-primary">
                                  <i class="fa fa-download"></i>
                                Download
                              </button>
                      </a>

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
                  </Center>
                </table>
                {!!$images->links()!!}
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
              <h4 class="modal-title">Add Image</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <Form method="POST" action="{{route('admin.addCarausel')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Image Name</label>
                    <input type="text" class="form-control @error('image_name') is-invalid @enderror" name="image_name">
                    @error('image_name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
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
<!--end of carausel section-->

<!--martketing main section-->
    <div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Marketing Main Section</h3>

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
                        @if(empty($marketingsectionmain))
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#marketingMainAddModal">
                          <i class="fa fa-plus"></i>Add
                        </button>
                        @endif
                        @if(!empty($marketingData))
                        <h2>{{$marketingData}} Record</h2>
                        @else
                        <h2>No Record</h2>
                        @endif
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover nowrap">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Main Heading</th>
                              <th>Main Paragraph</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if(!empty($marketingsectionmain))
                            <tr>
                              <td>{{$marketingsectionmain->id}}</td>
                              <td>{{$marketingsectionmain->main_heading}}</td>
                              <td>{{$marketingsectionmain->main_paragraph}}</td>
                              <td>
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#marketingMainUpdateModal{{$marketingsectionmain->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#marketingMainDeleteModal{{$marketingsectionmain->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                              </td>
                            </tr>

                            <!--edit modal for marketing main section-->
                            
                            <div class="modal fade" id="marketingMainUpdateModal{{$marketingsectionmain->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Update</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.updateMarketingMain')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$marketingsectionmain->id}}"  hidden="true">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="">Main Heading</label>
                                                <input type="text" class="form-control @error('main_heading') is-invalid @enderror" name="main_heading"  value="{{$marketingsectionmain->main_heading}}">
                                                @error('main_heading')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <label for="">Main Paragraph</label>
                                              <textarea class="form-control @error('main_paragraph') is-invalid @enderror" name="main_paragraph">
                                                {{$marketingsectionmain->main_paragraph}}
                                              </textarea>
                                              @error('main_paragraph')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
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

                            <div class="modal fade" id="marketingMainDeleteModal{{$marketingsectionmain->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Delete</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <Form method="post" action="{{route('admin.deleteMarketingMain')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                          <div class="row">
                                            <input type="text" name="id" value="{{$marketingsectionmain->id}}"  hidden="true">
                                            
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


        <div class="modal fade" id="marketingMainAddModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <Form method="post" action="{{route('admin.addMarketingMain')}}" enctype="multipart/form-data">
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
                          <label for="">Main Paragraph</label>
                          <textarea class="form-control @error('main_paragraph') is-invalid @enderror" name="main_paragraph">
                            
                          </textarea>
                          @error('main_paragraph')
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
<!--end of marketing main section-->

<!--marketing Row Section-->

<div class="row">
          <div class="col-md-12">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Marketing Row Section</h3>

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

                  @if(!empty($totalmarketingrowData))
                    <h3 class="card-title">{{$totalmarketingrowData}} Records</h3>
                    @else
                    <h3 class="card-title">0 Records</h3>
                  @endif

                  <br>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#marketingRowModal">
                  <i class="fa fa-plus"></i>Add
                </button>
               
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
                  @if(!empty($marketingrowdata))
                  @foreach($marketingrowdata as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->fontawesome}}</td>
                      <td>{{$data->heading}}</td>
                      <td>{{$data->paragraph}}</td>
                      <td>

                      <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#marketingRowEditModal{{$data->id}}">
                                  <i class="fa fa-edit"></i>Edit
                                </button>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#marketingRowDeleteModal{{$data->id}}">
                                  <i class="fa fa-trash"></i>Delete
                                </button>
                              
                      </td>
                    </tr>

                    <!--edit modal for marketing row section-->

                    <div class="modal fade" id="marketingRowEditModal{{$data->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" action="{{route('admin.updateMarketingRow')}}"  enctype="multipart/form-data">
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

                        <div class="modal fade" id="marketingRowDeleteModal{{$data->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Delete</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <Form method="post" action="{{route('admin.deleteMarketingRow')}}">
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
                  <h4 class="modal-title">Add</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{route('admin.addMarketingRowData')}}">
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
                          @error('Heading')
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