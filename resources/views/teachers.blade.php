<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6" data-bs-theme="dark">
                    <h1 class="text-3xl py-3 text-gray-900 dark:text-gray-100">{{ __("Class teachers") }}</h1>
                    <div id="allStudents">
                        <table class="table-fixed w-full text-center text-gray-900 dark:text-gray-100">
                            <thead>
                                <tr>
                                    <th class="w-1/5">{{ __("Surname") }}</th>
                                    <th class="w-1/5">{{ __("First name") }}</th>
                                    <th class="w-1/5">{{ __("Patronymic") }}</th>
                                    <th class="w-1/5">{{ __("Class") }}</th>
                                    <th class="w-1/5">{{ __("Change class") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $el)
                                    <tr>
                                        <td>{{ $el->surname }}</td>
                                        <td>{{ $el->first_name }}</td>
                                        <td>{{ $el->patronymic }}</td>
                                        <td>{{ $el->class->name }}</td>
                                        <td>
                                            <form action="{{ route('teachers.update', $el->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <select name="class_id" id="class_id" class="text-black">
                                                    <option selected hidden>{{ $el->class->name }}</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">{{ __("Change") }}</button>
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
    </div>

    
</x-app-layout>
