@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Contact us List</h1>
            <?php /* <a href="{{ url(ADMIN.'-add-banner') }}" class="btn btn-primary">Add banner</a> */ ?>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">contact_us</li>
              </ol>
          </nav>
          
        </div><!-- End Page Title -->

        <section class="section ">
        <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <?php if(Session::has('message')){ 
                echo '<h5 class="card-title">'.
                  alertBS(session('message')['msg'], session('message')['type']).
                '</h5>';
                } ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <!-- <th>Front</th> -->
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>For</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($contactList))
                @php 
                  $sn=1; 
                  $commonmodel = new App\Models\Common_model;
                @endphp
                @foreach($contactList as $list)
                  <?php //$frontUrl = $commonmodel->getOneRecord('tbl_page',['id'=>$list->page])->page_url; 
                    if($list->type == 'BT'){
                      $type = 'Book A Trip';
                      $package = $commonmodel->getOneRecord('tbl_package',['p_id'=>$list->p_id]);
                      $for = (isset($package->tour_title))?$package->tour_title:'--'; 
                    }elseif($list->type == 'HA'){
                      $type = 'Hotal Availability';
                      $hotel = $commonmodel->getOneRecord('tbl_hotel',['h_id'=>$list->h_id]);
                      $for = (isset($hotel->hotel_title))?$hotel->hotel_title:'--'; 
                    }elseif($list->type == 'VI'){
                      $visa = $commonmodel->getOneRecord('tbl_visa',['id'=>$list->v_id]);
                      $for = (isset($visa->visa_name))?$visa->visa_name:'--'; 
                      $type = 'VISA';
                    }else{
                      $type = 'Contact Us';
                      $for = '--';
                    }
                  ?>
                <tr>
                    <td>{{ $sn++; }}</td>
                    <td>{{ $list->name }}</td>
                    <?php /*<td><a href="{{ base_url().$frontUrl?>" class="btn btn-outline-info btn-sm" target="blank">View</a></td> */ ?>
                    <td>{{ $list->email }}</td>
                    <?php /*<td>
                        <img alt="image" src="{{ ($list->image != '')?url(IMAGE_PATH.$list->image):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td> */ ?>
                    <td>{{ $list->phone }}</td>
                    <td>{{ $type }}</td>
                    <td>{{ $for }}</td>
                    <td>
                        {!! ($list->status == "N")?'<span class="badge bg-success">New</span>':'<span class="badge bg-warning">Old</span>' !!}
                    </td>
                    <td><button type="button" class="btn btn-outline-info" onclick="change_status(<?=$list->id.',\''.$list->status.'\''?>);">Change Status</button></td>
                    <?php /* <td width="200">
                        <a href="{{  url(ADMIN.'-edit-banner/'.$list->id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!--<a href="{{  url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a>-->
                        <?php $delConfig = array(
                          'table' => 'tbl_banner',
                          'field' => 'id',
                          'val' => $list->id,
                          'url' => ADMIN.'-banner',
                          'old_image' => $list->image,
                        );
                        $delConfig = base64_encode(json_encode($delConfig)); ?>
                        <a href="{{ url(ADMIN.'-deleteRecord/'.$delConfig) }}" onclick="return confirm('Are you sure?')"  class="btn btn-outline-info" style="color:red"><i class="bi bi-trash"></i></a>
                        
                    </td> */ ?>
                </tr>
                @endforeach
                @else
                    <tr><td colspan="5">No Data Available</td></tr>
                @endif
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
        </section>

    </main><!-- End #main -->
    <!-- Modal -->
    <div class="modal fade" id="change-status-modal" tabindex="-1" data-bs-backdrop="false" style="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success text-light">
            <h5 class="modal-title">Change Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url()->current() }}" method="post">
            @csrf
          <input type="hidden" name="id" id="c_id" value="">
          <div class="modal-body">
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="statusN" value="N" >
                        <label class="form-check-label" for="statusN">
                        New
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="statusO" value="O" >
                        <label class="form-check-label" for="statusO">
                        Old
                        </label>
                    </div>
                    <span class="text-danger"></span>
                    
                </div>
            </fieldset>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      function change_status(id, status){
        $("#c_id").val(id);
        $("#status"+status).prop("checked", true);
        $("#change-status-modal").modal('show');
      }
    </script>
    @endsection()