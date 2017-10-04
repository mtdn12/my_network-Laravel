<div id="info">
@if (session('info'))
    <div class ="alert alert-info" role = "alert" v-if="appear">
        {{session('info')}}
    </div>
@elseif(session('error'))
    <div class ="alert alert-danger" role = "alert" v-if="appear">
        {{session('error')}}
    </div>
@endif
</div>