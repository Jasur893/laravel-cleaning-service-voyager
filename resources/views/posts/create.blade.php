<x-layoults.main>
    <x-slot:title>
        {{ __('Create Post') }}
    </x-slot:title>

    <x-page-header>
        {{ __('Create New Post') }}
    </x-page-header>

    <div class="container-fluid">
        <div class="container py-4">
            <div class="row">
                <div class="contact-form mx-auto w-50">
                    <div id="success"></div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group mb-3">
                            <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}"
                                   placeholder="Title"/>
                            @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="control-group mb-3">
                            <label>Kategoriya</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="control-group mb-3">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="control-group mb-3">
                            <input type="file" name="photo" class="form-control p-4" id="subject" placeholder="Photo"/>
                            @error('photo')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-3">
                            <textarea class="form-control p-4" rows="6" name="short_content"
                                      placeholder="Short Content">{{ old('short_content') }}</textarea>
                            @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="control-group mb-3">
                            <textarea class="form-control p-4" rows="6" name="contents"
                                      placeholder="Content">{{ old('contents') }}</textarea>
                            @error('contents')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layoults.main>

