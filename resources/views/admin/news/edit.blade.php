@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-4xl font-bold
               text-[#5C3A2E]
               mb-8">

        Nieuwsartikel wijzigen

    </h1>

    <div class="bg-white
                rounded-2xl
                shadow-lg
                border
                border-[#E8D8C4]
                p-8">

        <form method="POST"
              action="{{ route('news.update', $news) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- TITLE -->

            <div class="mb-5">

                <label class="block
                               font-semibold
                               mb-2">

                    Titel

                </label>

                <input type="text"
                       name="title"
                       value="{{ $news->title }}"
                       class="w-full
                              border
                              rounded-xl
                              p-3">

            </div>


            <!-- CONTENT -->

            <div class="mb-5">

                <label class="block
                               font-semibold
                               mb-2">

                    Inhoud

                </label>

                <textarea name="content"
                          rows="8"
                          class="w-full
                                 border
                                 rounded-xl
                                 p-3">{{ $news->content }}</textarea>

            </div>


            <!-- IMAGE -->

            <div class="mb-5">

                <label class="block
                               font-semibold
                               mb-2">

                    Afbeelding

                </label>

                <input type="file"
                       name="image"
                       class="w-full">

            </div>


            <!-- TAGS -->

            <div class="mb-8">

                <label class="block
                               font-semibold
                               mb-2">

                    Tags

                </label>

                <div class="flex
                            flex-wrap
                            gap-3">

                    @foreach($tags as $tag)

                        <label>

                            <input type="checkbox"
                                   name="tags[]"
                                   value="{{ $tag->id }}"

                                @checked(
                                    $news->tags
                                    ->contains($tag->id)
                                )>

                            {{ $tag->name }}

                        </label>

                    @endforeach

                </div>

            </div>


            <button class="bg-[#2F241F]
                           text-[#E8D8C4]
                           px-6
                           py-3
                           rounded-xl
                           font-semibold">

                Nieuws Opslaan

            </button>

        </form>

    </div>

</div>

@endsection