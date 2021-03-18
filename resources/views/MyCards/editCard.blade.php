@extends('layouts.app')

@section('content')
<h1 class="text-center">
    <a href="{{route('MyCards.edit',[$collection->collection_name])}}">
        {{$collection->collection_name}}
    </a>
</h1>
<form action="{{route('MyCards.updateCard',[$collection->collection_name, $card_id])}}" method="POST">
    @csrf
    @method('PATCH')
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-2">
                    <button class="arrow left svg-button">
                        <svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                          <polyline fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" 
                          stroke-linejoin="round" points="
                          45.63,75.8 0.375,38.087 45.63,0.375 "/>
                        </svg>  
                    </button>
                </div>
                <div class="col-8 text-center bg-dark h3">  
                    <p class="text-white h1 m-3">
                        <label for="header">Заголовок карточки: </label>
                    </p>
                    <input class="m-3 text-center" id="header" name="header" placeholder="header" value="{{$card->header}}"/>
                    <br>  
                    <label class="m-3 text-white" for="text">Ответ: </label> 
                    <br>
                    <textarea id="collection_description" name="text" 
                        placeholder="description">{{$card->text}}</textarea>
                    <br>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-outline-light">Сохранить изменения</button>
                    <br>
                    <br>
                </div>
</form>   
                <div class="col-2">
                    <form action="{{route('MyCards.destroyCard',[$collection->collection_name,$card_id])}}" method="POST">
                        @csrf
                        @method('DELETE')   
                            <button class="btn btn-outline-danger p-2">
                                <span>Удалить карточку</span>
                            </button>
                        </form>
                    <a class="arrow right svg-button"
                        href="{{route('MyCards.editCard',[$collection->collection_name,$card_id+1])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                          <polyline fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" points="
                          0.375,0.375 45.63,38.087 0.375,75.8 "/>
                        </svg>
                    </a>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <a href="{{route('MyCards.createCard',$collection->collection_name)}}">    
                        <div class="container p-5 mb-5 text-center border-add">
                            <h1>Добавить карточку</h1>
                            <img src="/img/add.png" width="10%" height="10%"/>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="container mb-5">
                <div class="row justify-content-center">
                    @foreach ($collection->cards as $card)
                        <div class="col-3 bg-dark m-2 text-center text-white">
                            <a class="d-block p-5" href="{{route('index.show',[$collection->collection_name,$loop->index])}}">
                            {{$card->header}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>  
        </div>        
@endsection