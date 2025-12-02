@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Destinations</h1>
            <a href="{{ url(ADMIN.'-add-location') }}" class="btn btn-primary">Add Destination</a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">locations</li>
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
                    <th>Type</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($listing))
                @php $sn=1; @endphp
                @foreach($listing as $list)
                  <?php //$frontUrl = $commonmodel->getOneRecord('tbl_page',['id'=>$list->page])->page_url; ?>
                  
                <tr>
                    <td>{{ $sn++; }}</td>
                    <td>{{ $list->name }}</td>
                    <td>{{ $list->type }}</td>
                    <?php /*<td><a href="{{ base_url().$frontUrl?>" class="btn btn-outline-info btn-sm" target="blank">View</a></td> */ ?>
                    <td>
                        <img alt="image" src="{{ ($list->image != '')?url(IMAGE_PATH.$list->image):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td>
                   
                    <td>
                        {!! ($list->status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                        <a href="{{  url(ADMIN.'-edit-location/'.$list->id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!--<a href="{{  url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a>-->
                        <?php $delConfig = array(
                          'table' => 'tbl_locations',
                          'field' => 'id',
                          'val' => $list->id,
                          'url' => ADMIN.'-locations',
                          'old_image' => $list->image,
                        );
                        $delConfig = base64_encode(json_encode($delConfig)); ?>
                        <a href="{{ url(ADMIN.'-deleteRecord/'.$delConfig) }}" onclick="return confirm('Are you sure?')"  class="btn btn-outline-info" style="color:red"><i class="bi bi-trash"></i></a>
                        
                    </td>
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

    @endsection()