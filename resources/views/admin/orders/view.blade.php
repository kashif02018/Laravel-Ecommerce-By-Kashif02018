@include('admin.partials.header')
@include('admin.partials.topbar')

<div id="layoutSidenav">
    @include('admin.partials.sidebar')

    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Order ID - {{$data->id}}</h1>
                        <ol class="card-header  mb-4" style="background:white;">
                            
                                            <a href="#0" onclick="orderStatus('Accepted','{{$data->id}}')"> 
                                                <span class="badge badge-success">
                                                    Accept
                                                </span>
                                            </a>
                                            <a href="#0" onclick="orderStatus('Dispatched','{{$data->id}}')">
                                                <span class="badge badge-success">
                                                Dispatch
                                                </span>
                                            </a>
                                            <a href="#0" onclick="orderStatus('Recieved','{{$data->id}}')">
                                                <span class="badge badge-success">
                                                    Deliver
                                                </span>
                                            </a>
                                            <a href="#0" onclick="orderStatus('Cancelled','{{$data->id}}')">
                                                <span class="badge badge-danger">
                                                    Cancel
                                                </span>
                                            </a>
                                            <a href="#0" onclick="orderStatus('Returned','{{$data->id}}')">
                                                <span class="badge badge-warning">
                                                    Return
                                                </span>
                                            </a>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Customer Info
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Customer Name:</div>
                                    <div class="col-md-5">{{$data->user->name}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Contact No:</div>
                                    <div class="col-md-5">{{$data->user->mobile}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Ship To:</div>
                                    <div class="col-md-5">{{$data->user->address}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Grand Total</div>
                                    <div class="col-md-5">  PKR {{$data->grand_total}}/-</div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-3">Payment Status:</div>
                                    <div class="col-md-5">
                                  
                                        @if($data->status == "Recieved")
                                            <span class="badge badge-success">
                                                PAID
                                            </span>
                                        @else  

                                        <span class="badge badge-warning">
                                            UNPAID
                                        </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Current Status:</div>
                                    <div class="col-md-5">  {{$data->status}}</div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              Order Items  
                            </div>
                            <div class="card-body">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Sub Total</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @forelse($data->details as $index=>$item)
                                        
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->item->name}}</td>
                                            <td>{{$item->product_qty}}</td>
                                            <td>{{$item->item->price}}</td>

                                            <td>PKR {{($item->item->price * $item->product_qty)}}/-</td>
                                           

                                        </tr>

                                        @empty 
                                            <p> No record found! </p>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@include('admin.partials.footer')
<script>
    function orderStatus(action, orderID){
         $.ajax({
             "url":'{{route("manageOrderStatus")}}',
             "method":'POST',
             'data':{action:action, orderID:orderID,_token: '{{csrf_token()}}'},
             success:function(resp){
                    alert(resp);
             },
             error:function(error){
                    alert(error);
             }
         })
    }
</script>