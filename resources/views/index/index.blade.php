@extends('layouts.app')

@section('content')
    <a href="{{route('index.create')}}">
    <div class="container p-5 mb-5 text-center border-add">
            <h1>Создать коллекцию карточек</h1>
            <img src="/img/add.png" width="10%" height="10%"/>
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
                <a href="{{route('index.show',[$collection->collection_name,0])}}">
                {{$collection->collection_name}}
                </a>
            </div>         
    @endforeach
        </div>
    </div>
    @else
    <h3 class="text-center"> Никто еще не создал свою коллекцию карточек, будьте первым</h3>
    @endif
@endsection