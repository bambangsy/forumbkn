@extends('layouts.forum')

@section('content')
    <div class="tt-wrapper-inner p-4">
        <h1 class="tt-title-border">
            Create New Topic
        </h1>
        <form action="{{ route('thread.store') }}" method="POST" class="form-default form-create-topic">
            @csrf
            <div class="form-group">
                <label for="inputTopicTitle">Topic Title</label>
                <div class="tt-value-wrapper">
                    <input type="text" name="title" class="form-control" id="inputTopicTitle"
                        placeholder="Subject of your topic" maxlength="99" oninput="updateCharCount(this)">
                    <span class="tt-value-input" id="charCount">99</span>
                </div>
                <script>
                    function updateCharCount(input) {
                        const maxLength = input.maxLength;
                        const currentLength = input.value.length;
                        document.getElementById('charCount').textContent = maxLength - currentLength;
                    }
                </script>
                <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
            </div>

            <div class="form-group">
                <label>Topic Type</label>
                <div class="tt-js-active-btn tt-wrapper-btnicon">
                    <div class="row tt-w410-col-02">
                        <div class="col-4 col-lg-3 col-xl-2">
                            <input type="hidden" name="type" class="form-control" id="inputTopicType">
                            <a href="#" class="tt-button-icon" onclick="saveValue('Discussion'); return false;">
                                <span class="tt-icon">
                                    <svg>
                                        <use xlink:href="#icon-discussion"></use>
                                    </svg>
                                </span>
                                <span class="tt-text">Discussion</span>
                            </a>
                        </div>
                        <div class="col-4 col-lg-3 col-xl-2">
                            <a href="#" class="tt-button-icon" onclick="saveValue('Question')">
                                <span class="tt-icon">
                                    <svg>
                                        <use xlink:href="#Question"></use>
                                    </svg>
                                </span>
                                <span class="tt-text">Question</span>
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                    function saveValue(value) {
                        // Code to save the value has been fixed

                        // Make the clicked element active
                        document.querySelectorAll('.tt-button-icon').forEach(function(button) {
                            button.classList.remove('active');
                        });
                        event.currentTarget.classList.add('active');
                        document.querySelector('input[name="type"]').value = value;
                    }
                </script>
            </div>

            <div class="form-group">
                <label for="inputExperts">Tag Experts</label>
                <select class="form-control" name="experts" id="inputExperts">
                    <option value="" disabled selected>Select an expert</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-editor">
                <h6 class="pt-title">Topic Body</h6>
                <div class="form-group">
                    <div id="quill-editor" style="height: 200px; background-color: white;"></div>
                    <input type="hidden" name="content" id="quill-hidden-input">
                </div>
                <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
                <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                <script>
                    var quill = new Quill('#quill-editor', {
                        theme: 'snow'
                    });
                    quill.on('text-change', function() {
                        document.getElementById('quill-hidden-input').value = quill.root.innerHTML;
                    });
                </script>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputTopicTitle">Category</label>
                            <select class="form-control" name="category">
                                <option value="" disabled selected>Pick a category</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputTopicTags">Tags</label>
                            <input type="text" name="tags" class="form-control" id="inputTopicTags"
                                placeholder="Use comma to separate tags">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto ml-md-auto">
                        <button class="btn btn-secondary btn-width-lg">Create Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection