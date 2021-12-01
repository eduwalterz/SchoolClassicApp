<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-md-2">ID</th>
                      <th class="col-md-3">Image Name</th>
                      <th class="col-md-3">Image</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    

                    @foreach($carausels as $image)
                    <tr>
                      <td>{{$image->id}}</td>
                      <td>{{$image->image_name}}</td>
                      <td>
                      <!--{{$image->image}}-->
                      <img height="100px" width="150px" src="{{public_path('/images/'.$image->image)}}" alt="">
                       <!--<img src="{{asset('images/'.$image->image)}}" style="width:25px; height: 25px;" class="img-circle">-->
                      </td>
                     
                    
                    </tr>
                    <!--edit modal-->
                   
                    <!--end of edit modal-->

                    <!--delete modal-->
                  
                    <!--end of delete modal-->
                    @endforeach
                    
                  </tbody>
                  </Center>
                </table>