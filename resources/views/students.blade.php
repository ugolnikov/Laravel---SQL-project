<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl py-3">{{ __("Students!") }}</h1>
                    <table class="table-fixed w-full text-center">
                        <thead>
                            <tr>
                                <th class="w-1/6">{{ __("Id") }}</th>
                                <th class="w-1/6">{{ __("Surname") }}</th>
                                <th class="w-1/6">{{ __("First name") }}</th>
                                <th class="w-1/6">{{ __("Patronymic") }}</th>
                                <th class="w-1/6">{{ __("Birthdate") }}</th>
                                <th class="w-1/6">{{ __("Class") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $el)
                            <tr>
                                <td>{{ $el->id }}</td>
                                <td>{{ $el->surname }}</td>
                                <td>{{ $el->first_name }}</td>
                                <td>{{ $el->patronymic }}</td>
                                <td>{{ (($el->birthdate)) }}</td>
                                <td>{{ $el->class }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
