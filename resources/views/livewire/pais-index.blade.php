<div>

    <div class="mt-5">
        <input wire:model.live.debounce.230ms="search" class="shadow appearance-none rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border border-gray-400 w-80" placeholder="Ingrese el nombre de un pais">
    </div>

    <div class="mt-4 mb-4">
        <ul>
            @if ($paises != null)
                
                @foreach ($paises as $key => $pais)
                    <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

                        <img class="w-full h-72 object-cover object-center" src="{{$banderas[$key]}}" alt="">
                        
                        <div class="px-6 py-4">
                            <h2 class="font-bold text-xl mb-2 hover:text-blue-400">
                                <a href="{{route('paises.show', $pais->sISOCode)}}">{{$pais->sName}}</a>
                            </h2>
                        </div>
                    
                    </article>
                @endforeach

            @else 
            
                <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

                    <img class="w-full h-72 object-cover object-center" src="{{$banderas}}" alt="">
                    
                    <div class="px-6 py-4">
                        <h2 class="font-bold text-xl mb-2 hover:text-blue-400">
                            <a href="{{route('paises.show', $pais->sISOCode)}}">{{$pais->CountryNameResult}}</a>
                        </h2>
                    </div>
                    
                </article>
                                     
            @endif
        </ul>
    </div>

    @if ($paises != null)
        <div class="mb-5">
            {{$paises->links()}}
        </div>
    @endif
</div>
