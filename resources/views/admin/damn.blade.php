<!--edit modal for ictDepartment section-->

        <div class="modal fade" id="ictDepartmentEditModal{{$ictdepartment->id}}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="{{route('admin.addIctDepartmentData')}}" enctype="multipart/form-data">
                  @csrf
                <div class="modal-body">
                  

                <div class="row">
                <input type="text" name="id" value="{{$ictdepartment->id}}"  hidden="true">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Main Heading</label>
                            <input type="text" class="form-control @error('main_heading') is-invalid @enderror" name="main_heading">
                            @error('main_heading')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        

                        <div class="col-md-12">
                          <label for="">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                          </div>
                        

                        <div class="col-md-12">
                          <label for="">Sub Heading</label>
                          <input type="text" class="form-control @error('sub_heading') is-invalid @enderror" name="sub_heading">
                          @error('sub_heading')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                      
                      
                      
                        <div class="col-md-12">
                          <label for="">Paragraph</label>
                          <textarea class="form-control @error('paragraph') is-invalid @enderror" name="paragraph">
                            
                          </textarea>
                          @error('paragraph')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                      

                      <div class="col-md-12">
                          <label for="">Persona</label>
                          <input type="text" class="form-control @error('persona') is-invalid @enderror" name="persona">
                          @error('persona')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                     

                      <div class="col-md-12">
                          <label for="">Persona's Title</label>
                          <input type="text" class="form-control @error('persona_title') is-invalid @enderror" name="persona_title">
                          @error('persona_title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
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
        <!-- edit of add modal for ictDepartment section-->
