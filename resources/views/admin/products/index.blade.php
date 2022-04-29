@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="row">
                    <div class="col-md-12">
                    <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Products List</h3></div>
                                    <a class="ml-4" href="/product-create">Add Product</a>
                                    <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Created By</th>
                                            <th>Upload Time</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($data as $key=>$product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td><img src="{{$product->image}}" style="width:150px;height:150px;"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->user_name->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a href="{{route('product_edit',$product->id)}}">
                                                    <i class="fa fa-edit"></i>  Edit
                                                </a>
                                            </td>

                                        </tr>
                                        @empty 


                                        @endforelse
                                      
                                        </tbody>
                                    </table>
                                    
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@include('admin.partials.footer')