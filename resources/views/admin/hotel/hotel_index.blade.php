@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Hotel</h1>
            <?php $config['tab'] = 1; 
            $config = base64_encode(json_encode($config)); ?>
            <a href="{{ url(ADMIN.'-hotel/'.$config) }}" class="icon btn btn-outline-success" title="Add"><i class="bx bxs-add-to-queue" style="font-size:24px"></i></a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">hotel</li>
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
                    <th>Image</th>
                    <th>MRP</th>
                    <th>SP</th>
                    <!-- <th>Show on Front</th> -->
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
                    <td>{{ $list->hotel_title }}</td>
                    
                    <td>
                        <img alt="image" src="{{ ($list->image != '')?url(IMAGE_PATH.$list->image):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td>
                    <td>{{ $list->mrp }}</td>
                    <td>{{ $list->sp }}</td>
                    <?php /*<td></td>
                    <td>
                        {!! ($list->is_featured=='Y')?'<span class="badge bg-success">Yes</span>':'<span class="badge bg-warning">No</span>' !!}
                    </td>
                    <td>
                        {!! ($list->is_front=='Y')?'<span class="badge bg-success">Yes</span>':'<span class="badge bg-warning">No</span>' !!}
                    </td> */ ?>
                    <td>
                        {!! ($list->status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                      @php 
                        $config = array();
                        $config['id'] = $list->h_id;
                        $config['tab'] = $list->c_tab;
                        $config = base64_encode(json_encode($config));
                      @endphp
                        <a href="{{ url(ADMIN.'-hotel/'.$config) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!-- <a href="" class="btn btn-outline-info" title="Copy"><i class="bi bi-copy"></i></a> -->
                        
                        <?php $delConfig = array(
                          'table' => 'tbl_hotel',
                          'field' => 'h_id',
                          'val' => $list->h_id,
                          'url' => ADMIN.'-hotels',
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