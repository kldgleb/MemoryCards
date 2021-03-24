@extends('layouts.app')

@section('content')

        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-2">
                    <form action="{{route('MyCardsEdit.destroyCollection',$collection->collection_path)}}">
                    @csrf
                    @method('DELETE')   
                        <button class="btn btn-outline-danger p-2">
                            <span>Удалить коллекцию</span>
                        </button>
                    </form>
                </div>
                <div class="col-8 text-center h3"> 
                    <form action="{{route('MyCardsEdit.updateCollection',$collection->collection_path)}}" method="POST">
                        @csrf
                        @method('PATCH')
                    <h1 class="text-center m-5">
                        Название коллекции:
                        <br>
                        <input  class="text-center" id="collection_name" name="collection_name" 
                                        value="{{$collection->collection_name}}"/>
                    </h1>   
                    <label for="collection_description">Описание коллекции: </label> 
                    <br>
                    <textarea id="collection_description" name="collection_description" 
                        placeholder="description">{{$collection->collection_description}}</textarea>
                </div>
                <div class="col-2">
                    <a href="{{route('MyCardsEdit.editCard',[$collection->collection_path,0])}}" class="btn btn-outline-dark p-2">
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