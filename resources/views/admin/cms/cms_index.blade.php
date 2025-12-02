@extends("admin._layouts.master")
@section("content")

    <main id="main" class="main">
        <div class="pagetitle ">
          <div class="d-flex justify-content-between">
            <h1>CMS</h1>
            <a href="{{ url(ADMIN.'-add-cms') }}" class="btn btn-primary">Add CMS</a>
          </div>
          <nav>
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url(ADMIN) }}">Dashboard</a></li>
              <li class="breadcrumb-item active">cms</li>
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
                    <th>Page</th>
                    <!-- <th>Front</th> -->
                    <th>Banner Title</th>
                    <th>Description</th>
                    <th>CMS Banner</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @if(!empty($cms))
                @php $sn=1; @endphp
                @foreach($cms as $list)
                  <?php //$frontUrl = $commonmodel->getOneRecord('tbl_page',['id'=>$list->page])->page_url; ?>
                  
                <tr>
                    <td>{{ $sn++; }}</td>
                    <td>{{ $list->page }}</td>
                    <td>{{ $list->banner_title }}</td>
                    <?php /*<td><a href="{{ base_url().$frontUrl?>" class="btn btn-outline-info btn-sm" target="blank">View</a></td> */ ?>
                    <td>{{ substr(strip_tags($list->description),0,50).'...' }}</td>
                    <td>
                        <img alt="image" src="{{ ($list->cms_banner != '')?url(IMAGE_PATH.$list->cms_banner):url(IMAGE_PATH.'dummy.png') }}" width="70px" height="60px"/>
                    </td>
                   
                    <td>
                        {!! ($list->status=='Y')?'<span class="badge bg-success">Active</span>':'<span class="badge bg-warning">InActive</span>' !!}
                    </td>
                    <td width="200">
                        <a href="{{  url(ADMIN.'-edit-cms/'.$list->id) }}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                        <!--<a href="{{  url('/admin/users/view_one/'.$list->id) ?>"><i class="far fa-eye"></i></a>-->
                        <?php $delConfig = array(
                          'table' => 'tbl_cms',
                          'field' => 'id',
                          'val' => $list->id,
                          'url' => ADMIN.'-cms',
                          'old_image' => $list->cms_banner,
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