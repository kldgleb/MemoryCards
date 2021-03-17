@extends('layouts.app')

@section('content')
<form action="{{route('MyCards.update',$collection->collection_name)}}" method="POST">
    @csrf
    @method('PATCH')
<h1 class="text-center m-5">
    Название коллекции:
    <br>
    <input  class="text-center" id="collection_name" name="collection_name" 
                    value="{{$collection->collection_name}}"/>
</h1>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-2">
                    <form action="{{route('MyCards.destroy',$collection->collection_name)}}">
                    @csrf
                    @method('DELETE')   
                        <button class="btn btn-outline-danger p-2">
                            <span>Удалить коллекцию</span>
                        </button>
                    </form>
                </div>
                <div class="col-8 text-center h3">    
                    <label for="collection_description">Описание коллекции: </label> 
                    <br>
                    <textarea id="collection_description" name="collection_description" 
                        placeholder="description">{{$collection->collection_description}}</textarea>
                </div>
                <div class="col-2">
                    <a href="{{route('MyCards.editCard',[$collection->collection_name,0])}}" class="btn btn-outline-dark p-2">
                        <span>Перейти к редактированию карточек</span>
                    </a>
                </div>
            
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-outline-dark">Сохранить изменения</button>
            </div>
        </div>  
</form>          
@endsection