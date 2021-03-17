@extends('layouts.app')

@section('content')

<h1 class="text-center">
        {{$collection->collection_name}}
</h1>
<form action="{{route('storeCard',$collection->collection_name)}}" method="POST">
        @csrf
        <div class="container p-5">
        
        <div class="row justify-content-center">
            <div class="col-2">
                
            </div>
            <div class="col-8 text-center bg-dark h3">  
                <p class="text-white h1 m-3">
                    <label for="header">Заголовок карточки: </label>
                </p>
                <input class="m-3 text-center" id="header" name="header" 
                placeholder="header"/>
                <br>  
                <label class="m-3 text-white" for="text">Ответ: </label> 
                <br>
                <textarea id="collection_description" name="text" 
                    placeholder="description"></textarea>
                <br>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <button type="submit" class="btn btn-outline-light">Добавить карточку</button>
                <br>
                <br>
            </div>
            <div class="col-2">
                    <a href="{{route('index')}}" class="btn btn-outline-dark p-2">
                        <span>Завершить создание коллекции</span>
                    </a>
            </div>
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