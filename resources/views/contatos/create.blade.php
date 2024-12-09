<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @error('cpf')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 flex items-center justify-center" role="alert">
                    <span class="font-medium">Oops! </span> {{ $message }}.
                  </div>
                @enderror
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contatos.store') }}" method="POST">
                        @csrf
                        <div class="container mx-auto flex items-center justify-center">
                            <div class="basis-1 px-4">
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" name="nome" class="block mt-1" />
                            </div>
                            <div class="basis-1 px-4">
                                <x-input-label for="sobrenome" :value="__('Sobrenome')" />
                                <x-text-input id="sobrenome" name="sobrenome" class="block mt-1" />
                            </div>
                        </div>
                        <div class="container mx-auto flex items-center justify-center mt-4">
                            <div class="basis-1 px-4">
                                <x-input-label for="cpf" :value="__('CPF')" />
                                <x-text-input id="cpf" name="cpf" class="block mt-1" />
                            </div>

                            <div class="basis-1 px-4">
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input id="telefone" name="telefone" class="block mt-1" />
                            </div>
                        </div>
                        <div class="container flex items-center justify-center mt-4 mx-auto">
                            <div class="px-4">
                                <x-input-label for="endereco" :value="__('Endereço')" />
                                <x-text-input id="endereco" name="endereco" class="block mt-1" />
                            </div>
                            <div class="px-4">
                                <x-input-label for="cep" :value="__('CEP')" />
                                <x-text-input id="cep" name="cep" class="block mt-1" />
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Criar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
