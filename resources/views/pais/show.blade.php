@extends('layouts.app')

@section('content')

<div class="mx-auto max-w-xl px-2 sm:px-6 lg:px-8 mt-3">
    
    <a class="p-2 border border-gray-400 hover:text-gray-500 float-right " href="{{url()->previous()}}">Volver</a>

    <h1 class="text-2xl font-bold text-gray-800 mt-5">
        {{$pais->sName}}
    </h1>

    <div class="text-lg text-gray-800 mb-2">
        <p>Capital: {{$pais->sCapitalCity}}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mx-auto">

        {{-- Contenido principal --}}
        <div class="lg:col-span-2">

            <figure>
                <img class="w-full h-80 object-cover object-center" src="{{$pais->sCountryFlag}}" alt="{{$pais->sName}}">
            </figure>

            <div class="text-lg text-gray-800 mt-4">
                <p>Continente: {{$pais->sContinentCode}}</p>
                <p>Codigo telefonico: +{{$pais->sPhoneCode}}</p>
                <p>Idioma: {{$pais->Languages->tLanguage->sName}}</p>
                <p>Moneda: {{$pais->sCurrencyISOCode}}</p>
            </div>

        </div>

        {{-- Contenido relacionado --}}
        {{-- <aside>
            <h1 class="text-2xl font-bold text-gray-600 mb-4">
                Más en {{$pais->sContinentCode}}
            </h1>

            <ul>
                @foreach ($similares as $similar)
                    @if($similar->id != $post->id)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar->id)}}">
                                @if($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="http://api.blog.test/storage/{{$similar->image->url}}" alt="{{$similar->name}}">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://www.esdesignbarcelona.com/sites/default/files/inline-images/Depositphotos_333877668_S.jpg" alt="{{$similar->name}}">
                                    
                                @endif
                                <span class="ml-2 text-gray-600 ">
                                    {{$similar->name}}
                                </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </aside> --}}

    </div>

</div>

