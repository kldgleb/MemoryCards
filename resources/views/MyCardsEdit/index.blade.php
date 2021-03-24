@extends('layouts.app')

@section('content')
<h1 class="text-center m-3">
    Мои коллекции карточек запоминания:
</h1>
<h4 class="text-center text-muted">
    @if(!$collections->isEmpty())
    Нажмите чтобы редактировать
    @else
    Вы еще не создали своих карточек 
    @endif
</h4>
<div class="container">
    <div class="row justify-content-center">
    @foreach ($collections as $collection)
        <div class="col-3 p-5 m-3 h4 bg-dark text-white text-center"> 
            <a href="{{route('MyCardsEdit.editCollection',[$collection->collection_path])}}" >
            {{$collection->collection_name}}
            </a>
        </div>
    @endforeach
    </div>
</div>
@endsection