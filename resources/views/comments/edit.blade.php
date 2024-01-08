<x-layoults.main>
    <x-slot:title>
        Post - {{ $post->id }}
    </x-slot:title>

    <x-page-header>
        Post - {{ $post->id }}
    </x-page-header>

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    @auth()
                        @canany(['update', 'delete'], [$post, 'admin'])
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-sm btn-outline-dark mr-2" href="{{ route('posts.edit', ['post' => $post->id]) }}">{{ __('Edit') }}</a>
                                <form
                                    onsubmit="return confirm('Rostan ham o\'chirmoqchimisiz ?');"
                                    action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" >{{ __('Delete') }}</button>
                                </form>
                            </div>
                        @endcanany
                    @endauth
                    <div class="mb-5">
                        <div class="d-flex mb-2">
                            @foreach($post->tags as $tag)
                                <a class="d-flex flex-wrap text-secondary text-uppercase font-weight-medium">{{ $tag->name }}</a>
                                <span class="text-primary px-2">|</span>
                            @endforeach
                            <a class="text-secondary text-uppercase font-weight-medium" href="">{{ $post->created_at }}</a>
                        </div>

                        <div class="d-flex mb-2">
                            <a class="bg-secondary text-white font-weight-medium px-2 py-1 rounded text-uppercase font-weight-medium">{{ $post->category->name }}</a>
                        </div>

                        <h1 class="section-title mb-3">{{ $post->title }}</h1>
                    </div>

                    <div class="mb-5">
                        <img class="img-fluid rounded w-100 mb-4" src="{{ asset('storage/' . $post->photo) }}" alt="Image">
                        <p>{{ $post->contents }}</p>
                        <h2 class="mb-4">Est dolor lorem et ea</h2>
                    </div>


                    {{--  Comment Start            --}}
                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">{{ __('Edit Comment') . ' id -' . $comment->id }}</h3>
                        @auth()
                            <form action="{{ route('posts.comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <textarea name="body" cols="30" rows="5" class="form-control">
                                        {{ $comment->body }}
                                    </textarea>
                                </div>
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <div class="form-group mb-0">
                                    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
                                </div>
                            </form>
                        @else
                            <div>Izoh qoldirish uchun
                                <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Sign In') }}</a>
                            </div>
                        @endauth
                    </div>
                </div>
                {{--  Comment End            --}}

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-white mb-3">{{ $post->user->name }}</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                            ipsum
                            ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr ea sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</x-layoults.main>
