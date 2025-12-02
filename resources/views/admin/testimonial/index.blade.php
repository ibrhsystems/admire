@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Testimonial</h1>
            <a href="{{ url(ADMIN.'-add-testimonial') }}" class="btn btn-primary">Add Testimonial</a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Testimonial</li>
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
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($testimonial))
                @php $sn=1; @endphp
                @foreach($testimonial as $list)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $list->name }}</td>
                    <td> {{ substr($list->description,0,50).'...' }}</td>
                    <td>
                        <img alt="image" src="{{ ($list->logo != '')?url(IMAGE_PATH.$list->logo):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="50px"/>
                    </td>
                    <?php /* <td><?=$list->post?></td> */ ?>
                    <td>
                        {!! ($list->status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                      
                        <a href="{{ url(ADMIN.'-edit-testimonial/'.$list->id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <?php /* <a href="<?= base_url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a> */ ?>
                        <?php $delConfig = array(
                          'table' => 'tbl_testimonial',
                          'field' => 'id',
                          'val' => $list->id,
                          'url' => ADMIN.'-testimonials',
                          'old_image' => $list->logo,
                        );
                        $delConfig = base64_encode(json_encode($delConfig)); ?>
                        <a href="{{ url(ADMIN.'-deleteRecord/'.$delConfig) }}" onclick="return confirm('Are you sure?')"  class="btn btn-outline-info" style="color:red"><i class="bi bi-trash"></i></a>
                     
                        
                    </td>
                </tr>
                @endforeach
                @else
                    <tr><td colspan="5" class="text-danger text-center">No Data Available</td></tr>
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