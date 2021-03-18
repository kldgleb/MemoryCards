@extends('layouts.app')

@section('content')

    <form action="{{route('index.store')}}" method="POST">
        @csrf
        <h1 class="text-center mt-5">
            Название коллекции:
            <br>
            <input  class="text-center" id="collection_name" name="collection_name" />
        </h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-2">
                    
                </div>
                <div class="col-8 text-center h3">    
                    <label for="collection_description">Описание коллекции: </label> 
                    <br>
                    <textarea id="collection_description" name="collection_description" 
                        placeholder="description"></textarea>
                </div>
                <div class="col-2">
    
                </div>
            <button type="submit" class="btn btn-outline-dark">Перейти к добавлению карточек</button>
            </div>
            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
        </div>    
    </form>
@endsection