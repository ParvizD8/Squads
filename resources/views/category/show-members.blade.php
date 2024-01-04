<x-layout>
    <div class="flex mt-20">
        <aside class="w-48 flex-shrink-0">

            <ul>
                <li class="mb-4">
                    <a href="/category/{{ $category->id }}">
                        <b>{{ $category->name }}</b>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <div class="flex flex-col mt-10 mb-10">
                <div class="-my-2 overflow-x-clip sm:-mx-6 lg:-mx-2">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Имя участника</b>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Уровень</b>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Активность</b>
                                        </div>
                                    </td>
                                </tr>

                                @foreach ($members as $member)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            {{ $member->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            {{ $member->level }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/member/{{ $member->id }}/status">
                                            @csrf
                                            @method('PATCH')

                                            @if($member->active)
                                            <input class="border border-gray-400 p-2 w-full rounded" type="hidden" name="active" id="active" value="0" required>
                                            <div class="flex items-center ml-4 font-medium">
                                                <button type="submit" class="whitespace-nowrap text-right bg-red-500 text-white uppercase font-semibold text-xs py-1 px-2 rounded-xl hover:bg-red-400">
                                                    Деактивировать
                                                </button>
                                            </div>
                                            @else
                                            <input class="border border-gray-400 p-2 w-full rounded" type="hidden" name="active" id="active" value="1" required>
                                            <div class="flex items-center ml-4 font-medium">
                                                <button type="submit" class="whitespace-nowrap text-right bg-green-700 text-white uppercase font-semibold text-xs py-1 px-2 rounded-xl hover:bg-green-600">
                                                    Активировать
                                                </button>
                                            </div>
                                            @endif

                                        </form>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/member/{{ $member->id }}/edit" class="text-blue-500 hover:text-blue-600">Редактировать</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/member/{{ $member->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-sm font-medium text-red-500">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mb-10">
                <a href="/member/create">Добавить игрока</a>
            </button>
        </main>
    </div>
    {{ $members->links() }}
</x-layout>