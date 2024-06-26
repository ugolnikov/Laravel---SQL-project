<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All of reports') }}
        </h2>
    </x-slot>


@if (isset($youngest))
<div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-xl">Самый младший первоклассник (из всей школы)</h2>
                    <ul>
                        <li>ФИО: {{$youngest->surname}} {{$youngest->first_name}} {{$youngest->patronymic}}</li>
                        <li>Класс: {{$youngest->class->name}}</li>
                        <li>Дата рождения: {{$youngest->birthdate}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>    
@endif


@if (isset($sum))
<div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-xl">Количество учеников во всех вторых классах</h2>
                    <p>Количество: {{ $sum }}</p>
                </div>
            </div>
        </div>
    </div>    
@endif

@if (isset($data))
<div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-xl">Количество учеников у каждого классного руководителя. </h2>
                    <ul>
                        @foreach ($data as $item)
                            <li class="text-s">
                                {{ $item['teacher'] }}: {{ $item['student_count'] }} ученик(ов)
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>    
@endif
    
</x-app-layout>
