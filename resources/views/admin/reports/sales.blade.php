@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Sales Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Sales List || Overall Sales Amount PKR {{$totalAmount}}/-
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Grand Total</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @forelse($data as $index=>$detail)
                                       
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$detail->user->name}}</td>
                                                <td>{{$detail->total_item}}</td>
                                                <td>PKR {{$detail->grand_total}}/-</td>
                                                <td>{{$detail->created_at}}</td>
                                                <td>
                                                    <span class="badge badge-warning">{{$detail->status}}</span>
                                                </td>

                                                <td>
                                                    <a href="{{route('orderSummary',$detail->id)}}">
                                                    <span class="badge badge-success">View Order Details</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty 
                                            <p>No record found! </p>

                                        @endforelse
                                        
                                    </tbody>
                                </table>
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