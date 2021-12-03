@include('inc.css')
<body class="animsition">
    {!! Toastr::message() !!}
    <div class="page-wrapper">

        @include('inc.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include('inc.header')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Manage Users</h2>
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="container-fluid">
                            <div class="row">

                            <div class="row m-t-30 col-lg-12">
                                  <div class="col-lg-12">
                                      <!-- DATA TABLE-->
                                      <div class="table-responsive m-b-40">
                                          <table class="table table-borderless table-data3">
                                              <thead>
                                                  <tr>
                                                      <th>Sl No.</th>
                                                      <th>User Mobile No.</th>
                                                      <th>User Name</th>
                                                      <th>Created At</th>
                                                      <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($list as $l)
                                                <tr>
                                                    <td>{{$l->id}}</td>
                                                    <td>{{$l->mobile}}</td>
                                                    <td>{{$l->username}}</td>
                                                    <td>{{$l->created_at}}</td>
                                                    <td>
                                                        <a href="{{url('dashboard/user-delete')}}/{{$l->id}}"">
                                                            <button class="btn btn-sm btn-outline-danger" type="button" onclick="return confirm('Are you sure to want to delete it?')">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach


                                              </tbody>
                                          </table>
                                      </div>
                                      <!-- END DATA TABLE-->
                                  </div>
                              </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
@include('inc.js')
