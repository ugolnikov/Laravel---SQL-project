<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full text-center justify-evenly">
            <a href="/students" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('List of all students') }}
            </a>
            <a href="/students/create" class="font-thin text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add new one') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6" data-bs-theme="dark">
                    <h1 class="text-3xl py-3 text-gray-900 dark:text-gray-100">{{ __("Students!") }}</h1>
                    <form id="classFilterForm">
                        <select id="classSelect" name="class_id" class="form-select rounded mb-5">
                            <option value="">Все классы</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    <div id="allStudents">
                        <table class="table-fixed w-full text-center text-gray-900 dark:text-gray-100">
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
                                        <td>{{ $el->birthdate }}</td>
                                        <td>{{ $el->class->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    
                    <table id="studentsTableHead" style="display: none" class="table-fixed w-full text-center text-gray-900 dark:text-gray-100">
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
                        <tbody id="studentsTableBody">
                            
                        </tbody>
                    </table>

                    <script>
                        
                        document.getElementById('classSelect').addEventListener('change', function() {
                            let classId = this.value;
                            if (classId === '') {
                                // Если выбрано "Choose here", показываем всех студентов
                                showAllStudents();
                            } else {
                                // Загружаем студентов по выбранному классу
                                // document.getElementById('studentsTableHead').style.display = 'inline-table';
                                fetchStudentsByClass(classId);
                            }
                        });

                        // Функция для загрузки всех студентов
                        function showAllStudents() {
                            document.getElementById('studentsTableBody').style.display = 'none';
                            document.getElementById('studentsTableHead').style.display = 'none';
                            document.getElementById('allStudents').style.display = 'block';
                        }

                        // Функция для загрузки студентов по выбранному классу
                        function fetchStudentsByClass(classId) {
                            fetch(`/students/class/${classId}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok ' + response.statusText);
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    let allStudent = document.getElementById('allStudents');
                                    if (studentsTableBody === null) {
                                        console.error('Element with id studentsTableBody not found');
                                        return;
                                    }

                                    // Очистить текущий список
                                    studentsTableBody.innerHTML = '';
                                    allStudent.style.display ='none';
                                    document.getElementById('studentsTableHead').style.display = 'inline-table';
                                    // Добавить новых студентов
                                    data.forEach(student => {
                                        studentsTableBody.innerHTML += `
                                            <tr>
                                                <td>${student.id}</td>
                                                <td>${student.surname}</td>
                                                <td>${student.first_name}</td>
                                                <td>${student.patronymic}</td>
                                                <td>${student.birthdate}</td>
                                                <td>${student.class.name}</td>
                                            </tr>
                                        `;
                                    });
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    </script>
                    {{-- <hr><hr><hr><hr>
                    <table class="table-fixed w-full text-center text-gray-900 dark:text-gray-100">
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
                                    <td>{{ $el->birthdate }}</td>
                                    <td>{{ $el->class->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
