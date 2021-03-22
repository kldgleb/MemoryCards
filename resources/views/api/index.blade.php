@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-10">
        <form action="{{route('Api.update')}}" method="POST">
            @csrf
                <button class="btn btn-outline-secondary" type="submit">Сгенерировать новый api токен</button>
        </form>  
    </div>
</div>
@endsection