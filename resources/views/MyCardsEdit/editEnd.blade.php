@extends('layouts.app')

@section('content')
<h1 class="text-center">
    <a href="{{route('MyCardsEdit.editCollection',[$collection->collection_name])}}">
        {{$collection->collection_name}}
    </a>
</h1>
<h3 class="text-muted text-center">
    {{$collection->collection_description}}
</h3>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-2">
            <a class="arrow left svg-button" href="{{route('MyCardsEdit.index')}}">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 424.098 424.098" style="enable-background:new 0 0 424.098 424.098;" xml:space="preserve">
                <g>
                    <g>
                        <path style="fill:#010002;" d="M351.191,401.923H72.901c-4.487,0-8.129-3.633-8.129-8.129V242.262l-56.664-0.114
                            c-3.284-0.008-6.243-1.992-7.495-5.023c-1.252-3.04-0.553-6.527,1.764-8.852L206.104,24.546c1.853-1.845,4.503-2.666,7.047-2.276
                            c2.414,0.39,4.511,1.845,5.731,3.942l47.43,47.43V58.499c0-4.487,3.633-8.129,8.129-8.129h47.755c4.495,0,8.129,3.642,8.129,8.129
                            v79.156l91.39,91.398c2.325,2.325,3.024,5.828,1.764,8.868c-1.26,3.032-4.227,5.007-7.511,5.007c-0.008,0-0.008,0-0.016,0
                            l-56.64-0.114v150.98C359.32,398.29,355.686,401.923,351.191,401.923z M81.03,385.666h262.033V234.67
                            c0-2.162,0.854-4.235,2.39-5.755c1.528-1.52,3.585-2.374,5.739-2.374c0.008,0,0.008,0,0.016,0l45.105,0.089l-79.855-79.863
                            c-1.528-1.528-2.382-3.593-2.382-5.747V66.628h-31.498v26.645c0,3.284-1.975,6.251-5.015,7.511
                            c-3.032,1.268-6.527,0.569-8.86-1.764l-57.038-57.038l-183.95,183.95l45.203,0.089c4.487,0.008,8.112,3.642,8.112,8.129
                            C81.03,234.149,81.03,385.666,81.03,385.666z"/>
                    </g>
                </g>
                </svg>
            </a>
        </div>
        <div class="col-8 text-center">    
            <br>
            <p class="text-dark h1 m-5">
                Карточки кончились !
            </p>
        </div>
        <div class="col-2">
            <a class="arrow right svg-button"
                href="{{route('MyCardsEdit.editCard',[$collection->collection_name,0])}}">
                <svg version="1.0" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                 width="100px" height="100px" viewBox="0 0 1200 1199.999" enable-background="new 0 0 1200 1199.999" xml:space="preserve">
                <g>
                    <path fill="#1A1A1A" stroke="#1A1A1A" stroke-miterlimit="10" d="M1084.549,475.525l-0.172,0.029
                        c-2.313-15.392-15.47-27.231-31.506-27.231c-17.665,0-31.985,14.32-31.985,31.985c0,0.783,0.175,1.517,0.23,2.287l-0.382,0.02
                        l0.699,3.117c0.145,0.848,0.347,1.664,0.558,2.486l3.693,16.469c6.98,31.137,10.519,63.201,10.519,95.309
                        c0,240.526-195.678,436.21-436.198,436.21c-240.526,0-436.207-195.684-436.207-436.21s195.681-436.204,436.207-436.204
                        c101.091,0,199.179,35.515,277.265,100.012l-46.019,57.057l180.673,21.307l-55.121-176.973l-39.496,48.969
                        C827.914,140.541,715.628,99.999,600.004,99.999c-275.703,0-500.003,224.297-500.003,499.997
                        c0,275.706,224.301,500.003,500.003,500.003c275.697,0,499.994-224.298,499.994-500.003c0-35.659-3.888-71.536-11.553-106.629
                        L1084.549,475.525z"/>
                </g>
                </svg>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <a href="{{route('MyCardsEdit.createCard',$collection->collection_name)}}">    
                <div class="container p-5 mb-5 text-center border-add">
                    <h1>Добавить карточку</h1>
                    <img src="/img/add.png" width="10%" height="10%"/>
                </div>
            </a>    
        </div>
        </div>
    </div>
</div>  
@endsection