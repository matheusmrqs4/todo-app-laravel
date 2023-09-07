<div class="bg-gray-800 shadow-2xl">
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 mb-5">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <span class="self-center text-2xl text-gray-400 font-semibold whitespace-nowrap">ToDo List App</span>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="{{ route('register') }}"
                            class="block py-2 pl-3 pr-4 md:text-blue-400 md:p-0 hover:text-blue-200">Crie sua Conta</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 pl-3 pr-4 md:text-blue-400 md:p-0 hover:text-blue-200">Faça Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
