@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Visa</h1>
            <a href="{{ url(ADMIN.'-add-visa') }}" class="icon btn btn-outline-success" title="Add"><i class="bx bxs-add-to-queue" style="font-size:24px"></i></a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">visa</li>
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
                    <th>Visa Name</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Visa Type</th>
                    <th>Visa Mode</th>
                    <?php /* <th>Max Stays</th>
                    <th>Process Time</th>
                    <th>Starting From</th> */ ?>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($visa))
                @php $sn=1; $commonmodel = new App\Models\Common_model; @endphp
                @foreach($visa as $list)
                  <?php $countries_name = $commonmodel->getOneRecord('tbl_countries',['countries_id'=>$list->country])->countries_name; ?>
                  
                <tr>
                    <td>{{ $sn++; }}</td>
                    <td>{{ $list->visa_name }}</td>
                    <td>{{ $countries_name }}</td>
                    <td>
                        <img alt="image" src="{{ ($list->image != '')?url(IMAGE_PATH.$list->image):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td>
                    <td>{{ $list->type }}</td>
                    <td>{{ $list->mode }}</td>
                    <?php /* <td>{{ $list->max_stays }}</td>
                    <td>{{ $list->process_time }}</td>
                    <td>{{ $list->start_from }}</td> */ ?>
                   
                    <td>
                        {!! ($list->status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                        <a href="{{  url(ADMIN.'-edit-visa/'.$list->id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!--<a href="{{  url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a>-->
                        <?php $delConfig = array(
                          'table' => 'tbl_visa',
                          'field' => 'id',
                          'val' => $list->id,
                          'url' => ADMIN.'-visa',
                          'old_image' => $list->image,
                        );
                        $delConfig = base64_encode(json_encode($delConfig)); ?>
                        <a href="{{ url(ADMIN.'-deleteRecord/'.$delConfig) }}" onclick="return confirm('Are you sure?')"  class="btn btn-outline-info" style="color:red"><i class="bi bi-trash"></i></a>
                        
                    </td>
                </tr>
                @endforeach
                @else
                    <tr><td colspan="10" class="text-danger text-center">No Data Available</td></tr>
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

    @endsection()