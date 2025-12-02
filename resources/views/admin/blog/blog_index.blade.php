@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>Blog</h1>
            <a href="{{ url(ADMIN.'-add-blog') }}" class="btn btn-primary">Add Blog</a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">blog</li>
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
                    <th>Title</th>
                    <th>Url</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($blogs))
                @php $sn=1; @endphp
                @foreach($blogs as $list)
                  <?php //$frontUrl = $commonmodel->getOneRecord('tbl_page',['id'=>$list->page])->page_url; ?>
                  
                <tr>
                    <td>{{ $sn++; }}</td>
                    <td>{{ $list->blog_title }}</td>
                    <?php /*<td><a href="{{ base_url().$frontUrl?>" class="btn btn-outline-info btn-sm" target="blank">View</a></td> */ ?>
                    <td>{{ $list->blog_url }}</td>
                    <td>
                        <img alt="image" src="{{ ($list->blog_image != '')?url(IMAGE_PATH.$list->blog_image):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td>
                   
                    <td>
                        {!! ($list->blog_status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                        <a href="{{  url(ADMIN.'-edit-blog/'.$list->blg_id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!--<a href="{{  url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a>-->
                        <?php $delConfig = array(
                          'table' => 'tbl_blog',
                          'field' => 'blg_id',
                          'val' => $list->blg_id,
                          'url' => ADMIN.'-blogs',
                          'old_image' => $list->blog_image,
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