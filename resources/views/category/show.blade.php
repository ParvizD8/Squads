<x-layout>
    <div class="flex mt-20">
        <aside class="w-48 flex-shrink-0">

            <ul>
                <li class="mb-4">
                    <a href="/category/{{ $category->id }}/teams/list">Список команд</a>
                </li>

                <li class="mb-4">
                    <a href="/category/{{ $category->id }}/members/list">Список участников</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <div class="flex flex-col mt-10 mb-10">
                <div class="-my-2 overflow-x-clip sm:-mx-6 lg:-mx-0">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Название команды</b>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Количество участников</b>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <b>Суммарный уровень участников</b>
                                        </div>
                                    </td>
                                </tr>

                                @foreach ($teamsWithMembers as $team)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            <a href="/team/{{ $team->id }}">
                                                {{ $team->name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                                {{ count($team->members) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                                {{ $team->members->sum('level') }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if($tossExists)
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                <a href="/category/{{ $category->id }}/toss/create">Перераспределить заново</a>
            </button>
            @else
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                <a href="/category/{{ $category->id }}/toss/create">Начать распределение</a>
            </button>
            @endif
        </main>
    </div>
</x-layout>