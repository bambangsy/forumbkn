@extends('layouts.forum')

@section('content')
    <div class="tt-custom-mobile-indent container mt-3">
        <div class="tt-categories-title">
            <div class="tt-title">Categories</div>
            <div class="tt-search">
                <form class="search-wrapper">
                    <form action="{{ route('category.index') }}" method="GET" class="search-form">
                        <input type="text" name="search" class="tt-search__input" placeholder="Search Categories">
                        <button class="tt-search__btn" type="submit">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-search"></use>
                            </svg>
                        </button>
                        <button class="tt-search__close" type="button">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-cancel"></use>
                            </svg>
                        </button>
                    </form>
                </form>
            </div>
        </div>
        <div class="tt-categories-list">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-12 col-lg-6">
                        <div class="tt-item" style="height: 250px; width: 100%;">
                            <div class="tt-item-header">
                                <ul class="tt-list-badge">
                                    <li><a href="{{ route('category.show', $category->id) }}"><span
                                                class="tt-color01 tt-badge">{{ $category->name }}</span></a></li>
                                </ul>
                                <h6 class="tt-title"><a href="{{ route('category.show', $category->id) }}">Threads -
                                        {{ $category->posts->count() }}</a></h6>
                            </div>
                            <div class="tt-item-layout">
                                <div class="innerwrapper">
                                    {{ Str::limit($category->description, 100) }}
                                </div>
                                <div class="innerwrapper">
                                    <h6 class="tt-title">Similar TAGS</h6>
                                </div>
                                <a href="#" class="tt-btn-icon">
                                    <i class="tt-icon"><svg>
                                            <use xlink:href="#icon-favorite"></use>
                                        </svg></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="tt-row-btn">
                        <button type="button" class="btn-icon js-topiclist-showmore">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-load_lore_icon"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
