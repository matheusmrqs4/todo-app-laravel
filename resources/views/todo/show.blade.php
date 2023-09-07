<x-app-layout>
    <x-slot name="header">
        @section('title', 'Ver Detalhes')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul
            class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
                <a href="{{ route('todos.index') }}"
                    class="block py-2 pl-3 pr-4 md:text-blue-400 md:p-0 hover:text-blue-200">Voltar</a>
            </li>
        </ul>

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg flex justify-center">
            <table class="text-sm text-left bg-gray-700 text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Terminou?
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Horário de Criação:
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-800 dark:bg-gray-800 dark:border-gray-700 text-center">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-200 whitespace-nowrap dark:text-white">
                            {{ $todo->description }}
                        </th>
                        <td class="px-6 py-4">
                            @if ($todo->done)
                                Sim
                            @else
                                Não
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $todo->created_at ? $todo->created_at->format('d/m/Y H:i') : 'Data não disponível' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}"
                                class="font-medium text-blue-400 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form method="post" action="{{ route('todos.destroy', ['todo' => $todo->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="font-medium text-blue-400 dark:text-blue-500 hover:underline"
                                    type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <x-footer></x-footer>
</x-app-layout>
