@include('layouts.app')
    <div class='container'>
        <div class='window'>
            <div class='order-info'>
                <div class='order-info-content'>
                    <h2>WishList</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            Item Name
                        </div>
                        <div class="col-md-3">
                            Price
                        </div>
                        <div class="col-md-3">
                            Action
                        </div>
                      
                    </div>
                    <hr>
                    @if(count($data ) <= 0)
                    <div class="row">
                        <div class="col-md-3">
                           
                        </div>
                        <div class="col-md-3">
                                No items found!
                        </div>

                        <div class="col-md-3">
                                 
                        </div>
                      
                    </div>

                    @endif
                    @foreach($data as $key=>$item)
                    <div class="row">
                        <div class="col-md-3">
                            {{$item->item->name}}
                        </div>
                        <div class="col-md-3">
                        PKR {{$item->item->price}}/-
                        </div>

                        <div class="col-md-3">
                                <span style="background:red;padding:12px;color:white;" onclick="removeItem('{{$item->item->id}}')"> Remove</span>  
                        </div>
                      
                    </div>
                    <hr>
                    @endforeach




                  

                </div>

           
                
        </div>
    </div>
    <script>
        function removeItem(product_id){
            $.ajax({
                    "url":'{{route("removeWishlist")}}',
                    "method":'GET',
                    'data':{product_id:product_id,_token: '{{csrf_token()}}'},
                    success:function(resp){
                            alert(resp);
                            location.reload();
                    },
                    error:function(error){
                            alert(error);
                    }
                })
        }

    </script>
    </body>
</html>
