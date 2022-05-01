@include('layouts.app')
        <div class="relative container min-h-screen bg-gray-100 dark:bg-gray-900 r py-4 sm:pt-0">
           <div class="row">
               @forelse($data as $item)
               <div class="col-md-4">
                   <a href="{{route('productView',$item->id)}}">
                        <img src="{{$item->image}}" style="height:200px;widht:200px;">
                        {{$item->name}}
                    </a>
                   <br>
                   PKR {{$item->price}}

               </div>
               @empty 

                <p>No record found!</p>
               @endforelse
           </div>
        </div>
    </body>
</html>
