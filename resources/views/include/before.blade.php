
<a href="{{route('carSeeMore',['id'=>$collection->id,'photo_index'=>($index -1 + count($photos))% count($photos)])}}" style="color: #17627a; background:white; width:30px; height:30px; display:flex; align-items:center; justify-conter:center; border-radius:50%"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" cursor="pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></a>