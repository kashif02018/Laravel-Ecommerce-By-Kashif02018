@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Top Selling Items Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Top Items</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              Top  Selling Items
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Orders</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @forelse($data as $index=>$detail)
                                        
                                            <tr>
                                                <td>{{$detail->item->name}}</td>
                                                <td>
                                                <span class="badge badge-success">
                                                    {{$detail->item->totalOrders($detail->product_id) }}

                                                </span>

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
<script>
$(document).ready(function() {
    $('#datatablesSimple').DataTable( {
        "order": [[ 1, "desc" ]],
        "bFilter": false,
        "bPaginate": false,
        "bLengthChange": false,
        "bInfo": false,
        "bAutoWidth": false 
    } );
} );
</script>