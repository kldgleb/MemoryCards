@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        <a href="{{route('index.show',[$collection->collection_path,0])}}">
            {{$collection->collection_name}}
        </a>
    </h1>
    <h3 class="text-muted text-center">
        {{$collection->collection_description}}
    </h3>

        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-2">
                    <a class="arrow left svg-button"
                            href="{{route('index.show',[$collection->collection_path,$card_id-1])}}">
                        <svg width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                          <polyline fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" 
                          stroke-linejoin="round" points="
                          45.63,75.8 0.375,38.087 45.63,0.375 "/>
                        </svg>  
                    </a>
                </div>
                <div class="col-8 bg-dark text-center">    
                    <br>
                    <p class="text-white h1 m-5">
                        {{$card->header}}
                    </p>
                    <div id="target" class="text-white h3 m-5" >
                        <button class="btn btn-outline-light"
                            onclick="replaceContentInContainer('target', 'answer')">
                                Посмотреть ответ
                        </button>
                    </div>
                    <div id="answer" class="text-white h3 m-5" style="display:none">   
                        {{$card->text}}
                    </div>
                    <br>
                </div>
                <div class="col-2">
                    <a class="arrow right svg-button"
                        href="{{route('index.show',[$collection->collection_path,$card_id+1])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60px" height="80px" viewBox="0 0 50 80" xml:space="preserve">
                          <polyline fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" points="
                          0.375,0.375 45.63,38.087 0.375,75.8 "/>
                        </svg>
                    </a>
                </div>
            </div>
        </div> 
        <div class="container mb-5">
            <div class="row justify-content-center">
                @foreach ($collection->cards as $card)
                    <div class="col-3 bg-dark m-2 text-center text-white">
                        <a class="d-block p-5" href="{{route('index.show',[$collection->collection_path,$loop->index])}}">
                        {{$card->header}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>       

        <script>
            function replaceContentInContainer(target, answer) {
                document.getElementById(target).style.display = 'none';  
                document.getElementById(answer).style.display = 'block';
            }
        </script>
@endsection
