@include('layouts.app')
        <div class="relative container min-h-screen bg-gray-100 dark:bg-gray-900 r py-4 sm:pt-0">
           <div class="row">
               @if($item)
               <form action="{{route('storeSession')}}" method="post">
                   @csrf
                    <div class="col-md-4">
                        <a href="{{route('productView',$item->id)}}">
                                <img src="/{{$item->image}}" style="height:200px;widht:200px;">
                                {{$item->name}}
                            </a>
                        <br>
                        PKR {{$item->price}}
                        <br>
                        <input type = "hidden" name="product_id" value="{{$item->id}}">
                        <input type = "number" name="quantity" value="1">
                        <input type = "hidden" name="price" value="{{$item->price}}">


                        <button class="btn btn-success" type="submit">Add to cart</button>
                            @auth
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="saveToWishlist('{{$item->id}}','{{Auth::user()->id}}')"> Add to Wislist</a>
                            @endauth

                            @guest 

                            <a href="javascript:void(0)" class="btn btn-primary" onclick="saveToWishlist('{{$item->id}}','0')"> Add to Wislist</a>

                            @endguest
                        <hr>
                        Info <br>
                        {{$item->short_description}}
                       
                    </div>
               </form>
              
               @endif
           </div>
        </div>


        <script>

            function saveToWishlist(productID,userID){
               if(userID == 0){
                   alert('Login is required to add product in wishlist!');
               }else{
                alert('User ID '+ userID);
                $.ajax({
                    "url":'{{route("storeWishlist")}}',
                    "method":'POST',
                    'data':{product_id:productID, user_id:userID,_token: '{{csrf_token()}}'},
                    success:function(resp){
                            alert(resp);
                    },
                    error:function(error){
                            alert(error);
                    }
                })

               }
            }
        </script>
    </body>
</html>
