
<div class="d-flex gap-5 ">
    <a href="{{ route('seeMore',['id'=>$ids['id']-1]) }}" style="background-color: rgba(255, 255, 255, 0.774); padding:3px; border-radius:50%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#17627a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></a>
    <a href="{{ route('seeMore',['id'=>$ids['id']+1]) }}" style="background-color:rgba(255, 255, 255, 0.808); padding:3px; border-radius:50%"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#17627a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
</div>