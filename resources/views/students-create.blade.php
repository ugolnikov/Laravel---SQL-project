<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full text-center justify-evenly">
        <a href="/students" class="font-thin text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of all students') }}
        </a>
        <a href="/students/create" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add new one') }}
        </a></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6"  data-bs-theme="dark">
                    <h1 class="font-bold text-xl dark:text-gray-200">
                        {{ __('Добавление ученика') }}
                    </h1>
                    @if($errors->any())
                        <div class="bg-red-600 text-center text-white py-6 my-2">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <form action="/students/create/input" method="post" class="py-2 h-full flex flex-col">
                        @csrf
                        <input type="text" name="surname" id="surname" class="mb-2" placeholder="Введите фамилию" required>
                        <input type="text" name="first_name" id="first_name" class="mb-2" placeholder="Введите имя" required>
                        <input type="text" name="patronymic" id="patronymic" class="mb-2" placeholder="Введите отчество" required>
                        <input type="date" name="birthdate" id="birthdate" class="mb-2" placeholder="Введите дату рождения" required>
                        
                        <select name="class_id" id="class_id" class="mb-2" required>
                            <option value="" disabled selected>Выберите класс</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                            @endforeach
                        </select>

                        <button type="submit" class="text-gray-200 border border-gray-400 py-2 w-auto">Отправить</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
