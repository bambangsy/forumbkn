@extends('layouts.forum')

@section('content')
    <div class="tt-single-topic-list">
        <div class="tt-item">
            <div class="tt-single-topic">
                <div class="tt-item-header">
                    <div class="tt-item-info info-top">
                        <div class="tt-avatar-icon">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-ava-{{ substr($post->user->name, 0, 1) }}"></use>
                                </svg></i>
                        </div>
                        <div class="tt-avatar-title">
                            <a href="#">{{ $post->user->name }}</a>
                        </div>
                        <a href="#" class="tt-info-time">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-time"></use>
                                </svg></i>{{ $post->created_at->format('l, d F Y') }}
                        </a>
                    </div>
                    <h3 class="tt-item-title">
                        {{ $post->details->title }}
                    </h3>
                    <div class="tt-item-tag">
                        <ul class="tt-list-badge">
                            @foreach (explode(',', $post->details->tags) as $tag)
                                <li class=""><a href="#"><span class="tt-badge">{{ $tag }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="tt-item-description">
                    <p>
                        {{ $post->content }}
                    </p>
                </div>
                <div class="tt-item-info info-bottom">
                    <a href="#" class="tt-icon-btn">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-like"></use>
                            </svg></i>
                        <span class="tt-text">671</span>
                    </a>
                    <a href="#" class="tt-icon-btn">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-dislike"></use>
                            </svg></i>
                        <span class="tt-text">39</span>
                    </a>
                    <a href="#" class="tt-icon-btn">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-favorite"></use>
                            </svg></i>
                        <span class="tt-text">12</span>
                    </a>
                    <div class="col-separator"></div>
                    <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-share"></use>
                            </svg></i>
                    </a>
                    <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-flag"></use>
                            </svg></i>
                    </a>
                    <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                        <i class="tt-icon"><svg>
                                <use xlink:href="#icon-reply"></use>
                            </svg></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="tt-item">
            <div class="tt-info-box">
                <h6 class="tt-title">Thread Status</h6>
                <div class="tt-row-icon">
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-reply"></use>
                                </svg></i>
                            <span class="tt-text">283</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-view"></use>
                                </svg></i>
                            <span class="tt-text">10.5k</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-user"></use>
                                </svg></i>
                            <span class="tt-text">168</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-like"></use>
                                </svg></i>
                            <span class="tt-text">2.4k</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-favorite"></use>
                                </svg></i>
                            <span class="tt-text">951</span>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class="tt-icon-btn tt-position-bottom">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-share"></use>
                                </svg></i>
                            <span class="tt-text">32</span>
                        </a>
                    </div>
                </div>
                {{-- <hr>
                <h6 class="tt-title">Frequent Posters</h6>
                <div class="tt-row-icon">
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-d"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-t"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-k"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-n"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-a"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-c"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="tt-item">
                        <a href="#" class=" tt-icon-avatar">
                            <svg>
                                <use xlink:href="#icon-ava-h"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr> --}}
                <div class="row-object-inline form-default mt-3">
                    <h6 class="tt-title">Sort replies by:</h6>
                    <ul class="tt-list-badge tt-size-lg">
                        <li><a href="#"><span class="tt-badge">Recent</span></a></li>
                        <li><a href="#"><span class="tt-color02 tt-badge">Most Liked</span></a></li>
                        <li><a href="#"><span class="tt-badge">Longest</span></a></li>
                        <li><a href="#"><span class="tt-badge">Shortest</span></a></li>
                        <li><a href="#"><span class="tt-badge">Accepted Answers</span></a></li>
                    </ul>
                    <select class="tt-select form-control">
                        <option value="Recent">Recent</option>
                        <option value="Most Liked">Most Liked</option>
                        <option value="Longest">Longest</option>
                        <option value="Shortest">Shortest</option>
                        <option value="Accepted Answer">Accepted Answer</option>
                    </select>
                </div>
            </div>
        </div>
        <form action="{{ route('reply.post', $post->id) }}" method="post">
            @csrf
            <div class="tt-wrapper-inner">
                <div class="pt-editor form-default">
                    <h6 class="pt-title">Post Your Reply</h6>
                    <div class="pt-row">
                        <div class="col-left">
                            <ul class="pt-edit-btn">
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-quote"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-bold"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-italic"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-share_topic"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-blockquote"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-performatted"></use>
                                        </svg>
                                    </button></li>
                                <li class="hr"></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-upload_files"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-bullet_list"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-heading"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-horizontal_line"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-emoticon"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-settings"></use>
                                        </svg>
                                    </button></li>
                                <li><button type="button" class="btn-icon">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-color_picker"></use>
                                        </svg>
                                    </button></li>
                            </ul>
                        </div>
                        <div class="col-right tt-hidden-mobile">
                            <a href="#" class="btn btn-primary">Preview</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="5" placeholder="Lets get started"></textarea>
                    </div>
                    <div class="pt-row">
                        
                        <div class="col-auto">
                            <div class="checkbox-group">
                                <input type="checkbox" id="checkBox21" name="checkbox" checked="">
                                <label for="checkBox21">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    <span class="tt-text">Subscribe to this topic.</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-auto">
                            <button class="btn btn-secondary btn-width-lg"> Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @foreach ($reply as $r)
            <div class="tt-item">
                <div class="tt-single-topic">
                    <div class="tt-item-header pt-noborder">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg>
                                        <use xlink:href="#icon-ava-{{ substr($r->user->name, 0, 1) }}"></use>
                                    </svg></i>
                            </div>
                            <div class="tt-avatar-title">
                                <a href="#">{{ $r->user->name }}</a>
                            </div>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg>
                                        <use xlink:href="#icon-time"></use>
                                    </svg></i>{{ date('d M, Y', strtotime($r->created_at)) }}
                            </a>
                        </div>
                    </div>
                    <div class="tt-item-description">
                        {{$r->content}}
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-like"></use>
                                </svg></i>
                            <span class="tt-text">0</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-dislike"></use>
                                </svg></i>
                            <span class="tt-text">0</span>
                        </a>
                        <a href="#" class="tt-icon-btn">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-favorite"></use>
                                </svg></i>
                            <span class="tt-text">0</span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-share"></use>
                                </svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-flag"></use>
                                </svg></i>
                        </a>
                        <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg>
                                    <use xlink:href="#icon-reply"></use>
                                </svg></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
