<x-app-layout>
    <x-slot name="header">
        @section('title', 'Editar Tarefa')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>
    <ul
        class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
        <li>
            <a href="{{ route('todos.index') }}"
                class="block py-2 pl-3 pr-4 md:text-blue-400 md:p-0 hover:text-blue-200">Voltar</a>
        </li>
    </ul>

    <div class="mt-6 relative overflow-x-auto shadow-2xl sm:rounded-lg flex justify-center">
        <form method="post" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
            @csrf
            @method('PUT')
            <input type="text" name="description" value="{{ $todo->description ?? old('description') }}"
                placeholder="Tarefa" class="p-4 text-gray-200 rounded-lg bg-gray-700 sm:text-md dark:bg-gray-700">

            <select name="done"
                class="p-4 mt-5 mb-5 bg-gray-700 border border-gray-300 text-gray-200 text-sm rounded-lg block w-full p-2.5">
                <option value="0" {{ old('done', $todo->done) == 0 ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('done', $todo->done) == 1 ? 'selected' : '' }}>Sim</option>
            </select>

            <button type="submit"
                class="p-4 ml-2 text-sm font-medium text-gray-200 focus:outline-none bg-gray-700 rounded-lg hover:bg-gray-600 hover:text-blue-400">Atualizar</button>
        </form>
    </div>
    <x-footer></x-footer>
</x-app-layout>
