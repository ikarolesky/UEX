<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contatos') }}
        </h2>
        <a class="font-medium text-gray-900 whitespace-nowrap dark:text-white" href="{{route('contatos.create')}}">Criar</a>
    </x-slot>
    <div class="container mx-auto">
        <gmp-map
  center="-23.6389929,-46.6557563"
  zoom="4"
  map-id="map"
  style="height: 400px"
>
        @foreach ($contacts as $mapPointer)
        <gmp-advanced-marker id="pointer"
        position="{{$mapPointer->latitude}},{{$mapPointer->longitude}}"
        title="{{$mapPointer->nome}}"
        ></gmp-advanced-marker>

@endforeach
</gmp-map>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table id="search-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Nome
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Endereço
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        CPF
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Telefone
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Coordenadas
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Ações
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $contact->nome . ' ' . $contact->sobrenome}}</td>
                                <td>{{$contact->rua}}</td>
                                <td>{{$contact->cpf}}</td>
                                <td>{{$contact->telefone}}</td>
                                <td id="coords">{{$contact->latitude . ',' . $contact->longitude}}
                                <td>
                                    <form action="{{route('contatos.destroy', $contact->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="ms-4 danger">
                                        {{ __('X') }}    
                                        </x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
