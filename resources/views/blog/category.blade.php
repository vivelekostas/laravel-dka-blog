{{-- отображение списка статей по категории --}}
@extends('layouts.app')

@section('title', $category->title . " - LaraBlog")

@section('content')

    <div class="container">
        <h3>{{$category->title}}</h3>
        @forelse($articles as $article)
            <div class="row">
                <div class="col-sm-12">
                    <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                    <p>{!!$article->description_short!!}</p>
                </div>
            </div>
        @empty
            <h2 class="text-center">Сорян, тут пусто</h2>
        @endforelse
        {{$articles->links()}}
    </div>

@endsection