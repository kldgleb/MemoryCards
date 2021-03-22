@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-10">
        <form action="{{route('Api.update')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{$token}}" readonly id="inputText"
                placeholder="api token" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="copyText">Скопировать</button>
                </div> 
            </div>
        </form>  
    </div>
</div>
<script>

    var text = document.getElementById("inputText");
    var btn = document.getElementById("copyText");    

    btn.onclick = function() {
    text.select();    
    document.execCommand("copy");
    }
</script>
@endsection