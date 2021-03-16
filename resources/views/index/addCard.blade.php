@extends('layouts.app')

@section('content')

<h1 class="text-center">
    <label class="text-dark">Текущая коллекция: {{$collection->collection_name}}</label>
</h1>
<form action="{{route('storeCard',$collection->collection_name)}}" method="POST">
        @csrf
    <div class="m-5 mx-auto container p-5 text-center bg-dark mh-70">
        <h2>
            <label class="text-white" for="header">Заголовок карточки: </label>
            <input id="header" name="header" placeholder="header"/>
        </h2>
        <h4>
            <label class="text-white" for="text">Информация:</label>
            <input class="p-5" id="text" name="text" placeholder="Text of your card"/>
        </h4>
        <br>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <button type="submit" class="btn btn-outline-light">Сохранить</button>
    </div>
</form>

@endsection