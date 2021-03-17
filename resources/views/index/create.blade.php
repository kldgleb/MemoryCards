@extends('layouts.app')

@section('content')

    <form action="{{route('index.store')}}" method="POST">
        @csrf
        <div class="container p-2 bg-dark text-center">
            <br>
            <h1>
                <label class="text-white h1" for="header">Название коллекции: </label>
                <input id="collection_name" name="collection_name" placeholder="name"/>
            </h1>
            <h3>    
                <label class="text-white h3" for="header">Описание коллекции: </label>
                <br>
                <textarea id="collection_description" name="collection_description" 
                    placeholder="description"></textarea>
            </h3>
            <br>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

        <button type="submit" class="btn btn-outline-light">Перейти к добавлению карточек</button>
        </div>
        
    </form>
@endsection