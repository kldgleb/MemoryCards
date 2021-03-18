@extends('layouts.app')

@section('content')

    <h4 class="text-center text-muted">
        @if($collections->isEmpty())
        Ничего не найдено :(
        @endif
    </h4>
    <div class="container">
        <div class="row justify-content-center">
    @foreach ($collections as $collection)
            <div class="col-3 p-5 m-2 h4 bg-dark text-white text-center"> 
                <a href="{{route('index.show',[$collection->collection_name,0])}}" id="showDescription">
                    {{$collection->collection_name}}
                </a>
                <a href="{{route('index.show',[$collection->collection_name,0])}}" id="target" style="display: none">
                    {{$collection->collection_description}}
                </a>
            </div>                 
    @endforeach
        </div>
    </div>
    
    {{ $collections->links() }}   
    <script>
        document.addEventListener("DOMContentLoaded", () => {
        let showDescription = document.querySelectorAll("#showDescription");
        let target = document.querySelectorAll("#target");
        for(let i = 0;i < showDescription.length;i++){
            showDescription[i].addEventListener("mouseover", function() {
                showDescription[i].style.display = 'none';  
                target[i].style.display = 'block';  
            });
            target[i].addEventListener("mouseout", function() {
                target[i].style.display = 'none';
                showDescription[i].style.display = 'block';
            });
        }
    });
    </script>
@endsection