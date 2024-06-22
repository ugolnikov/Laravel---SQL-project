<x-app-layout>

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg  ">
                <div class="p-6  data-bs-theme="dark">
                    <h1 class="font-bold text-xl dark:text-gray-200">
                        {{ __('Обратная связь') }}
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
                    <form action="/feedback/send" method="post" class="py-2 h-full flex flex-col">
                        @csrf
                        <input type="email" name="email" id="email" class="mb-2" placeholder="Введите почтовый адрес">
                        <input type="text" name="subject" id="subject" class="mb-2" placeholder="Введите ваш отзыв">
                        <textarea name="message" id="message" class="mb-2" placeholder="Введите текстовое сообщение"></textarea>
                        <button type="submit" class="text-gray-200 border border-gray-400 py-2 w-auto">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
