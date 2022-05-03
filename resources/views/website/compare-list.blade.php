@include('layouts.app')
    <div class='container'>
        <div class='window'>
            <div class='order-info'>
                <div class='order-info-content'>
                    <h2>Compare List View</h2>
                    <hr>
                    
                   
                    
                    <div class="row">
                        @foreach($data as $key=>$item)
                            <div class="col-md-6" style="border-right:1px solid black;"> 
                                <b> Item-{{$key+1}} Details</b><hr>
                                Item Name :{{$item->item->name}} <br>
                                <img src="/{{$item->item->image}}" style="height:200px;widht:200px;"><br>

                                Item Name :{{$item->item->name}} <br>
                                Item Price :{{$item->item->price}} <br>
                                Item Description :{{$item->item->price}} <br>
                                Item Reviews :{{$item->item->price}} <br>
                                Item Features :{{$item->item->price}} <br>
                            </div>   
                        @endforeach                     
                    </div>
                   




                  

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
