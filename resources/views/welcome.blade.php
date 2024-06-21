@extends('layouts.forum')

@section('content')

    <div class="tt-topic-list">
        <div class="tt-list-header">
            <div class="tt-col-topic">Topic</div>
            <div class="tt-col-category">Category</div>
            <div class="tt-col-uploadedby">Uploaded by</div>
            <div class="tt-col-uploadedat">Uploaded at</div>
            <div class="tt-col-value hide-mobile">Likes</div>
            <div class="tt-col-value hide-mobile">Replies</div>
            <div class="tt-col-value hide-mobile">Views</div>
            <div class="tt-col-value">Activity</div>
        </div>
    

        @foreach($posts as $post)
        <div class="tt-item">
            <div class="tt-col-avatar">
                <svg class="tt-icon">
                    <use xlink:href="#icon-ava-{{ substr($post->user->name, 0, 1) }}"></use>
                </svg>
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="{{route('thread.show', $post->id)}}">
                        {{ $post->details->title }}
                    </a></h6>
                <div class="row align-items-center no-gutters">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            @foreach(explode(',', $post->details->tags) as $tag)
                            <li class=""><a href="#"><span class="tt-badge">{{ $tag }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="tt-col-category"><span class="tt-badge">{{ $post->details->category->name }}</span></div>
            <div class="tt-col-uploadedby"><a href="#">{{ $post->user->name }}</a></div>
            <div class="tt-col-uploadedat">{{ $post->created_at->diffForHumans() }}</div>
            
            <div class="tt-col-value hide-mobile">0</div>
            <div class="tt-col-value hide-mobile">0</div>
            <div class="tt-col-value hide-mobile">0</div>
            <div class="tt-col-value hide-mobile">0</div>
        </div>
        @endforeach

        
        <div class="tt-row-btn">
            <button type="button" class="btn-icon js-topiclist-showmore">
                <svg class="tt-icon">
                    <use xlink:href="#icon-load_lore_icon"></use>
                </svg>
            </button>
        </div>
    </div>

 @endsection
