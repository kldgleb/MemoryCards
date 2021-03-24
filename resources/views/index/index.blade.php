@extends('layouts.app')

@section('content')
    <a href="{{route('index.create')}}">
    <div class="container p-5 mb-5 text-center border-add">
            <h1>Создать коллекцию карточек</h1>
            <img class="myImg" src="/img/add.png">
    </div>
    </a>
    @if ($collections->first()) 
    <h2 class="text-center">
        Существующие коллекции:
    </h2>       
    <div class="container">
        <div class="row justify-content-center">
    @foreach ($collections as $collection)
            <div class="col-3 p-5 m-2 h4 bg-dark text-white text-center"> 
                <a href="{{route('index.show',[$collection->collection_path,0])}}" id="showDescription">
                    {{$collection->collection_name}}
                </a>
                <a href="{{route('index.show',[$collection->collection_path,0])}}" id="target" style="display: none">
                    @if(!$collection->collection_description)
                        
                        {{$collection->collection_name}}
                    @else
                        {{$collection->collection_description}}
                    @endif
                </a>
                
            </div>                 
    @endforeach
        </div>
    </div>
    @else
    <h3 class="text-center"> Никто еще не создал свою коллекцию карточек, будьте первым</h3>
    @endif
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
