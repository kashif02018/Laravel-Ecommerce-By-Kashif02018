@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Item</h3></div>
                                    <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('product_store') }}" enctype="multipart/form-data">
                                     @csrf


                                            <div class="row mb-3">
                                         
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label>Enter Name</label>
                                                        <input id="inputFirstName" type="text" placeholder="Enter product name" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                                    </div>
                                                </div>
                                            
                                            </div>

                                            <div class="row mb-3">
                                         
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input id="imageName" type="file" class="form-control" name="image"  >

                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="form-floating mb-3">
                                            <label>Short Description (150 Allowed)</label>
                                                <textarea class="form-control" name="short_description"></textarea>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <label>Enter Price</label>
                                                <input type="number" placeholder="Enter Price" class="form-control" name="price">
                                            </div>
                                            <div class="form-floating mb-3">
                                            <label>Enter Qunatity</label>
                                                <input type="number" placeholder="Enter Quantity" class="form-control" name="qty">
                                            </div>
                                           
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add Product</button></div>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

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