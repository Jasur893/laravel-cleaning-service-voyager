<x-layoults.main>
    <x-slot:title>
        {{ __('Change the post') }} #{{ $post->id }}
    </x-slot:title>

    <x-page-header>
        {{ __('Change the post') }} #{{ $post->id }}
    </x-page-header>

    <div class="container-fluid">
        <div class="container py-4">
            <div class="row">
                <div class="contact-form mx-auto w-50">
                    <div id="success"></div>
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="control-group mb-3">
                            <input type="text" class="form-control p-4" name="title" value="{{ $post->title }}" placeholder="Sarlavha" />
                            @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-3">
                            <input type="file" name="photo" class="form-control p-4" id="subject" placeholder="Rasm" />
                            <img src="{{ asset(asset('storage/' . $post->photo)) }}" width="40px" height="40px"  alt="Rasm">
                            @error('photo')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-3">
                            <textarea class="form-control p-4" rows="6" name="short_content" placeholder="Qisqacha Mazmuni" >{{ $post->short_content }}</textarea>
                            @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-3">
                            <textarea class="form-control p-4" rows="6" name="contents" placeholder="Ma'qola" >{{ $post->contents }}</textarea>
                            @error('contents')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success py-3 px-5" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-danger py-3 px-5">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layoults.main>

