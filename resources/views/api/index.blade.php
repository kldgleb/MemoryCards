@extends('layouts.app')

@section('content')
<h1 class="text-center m-5">
    <a href="/api/documentation">
        Documentation
    </a>
</h1>
<div class="container mt-5">
    <div class="col-10">
        <form action="{{route('Api.update')}}" method="POST">
            @csrf
                <button class="btn btn-outline-secondary" type="submit">Сгенерировать новый api токен</button>
        </form>  
    </div>
</div>
@endsection