<x-layout>
    <div class="flex mt-20">
        <aside class="w-48 flex-shrink-0">

            <ul>
                <li class="mb-4">
                    <b>{{ $membersWithTeam[0]->name }}</b>
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
                                </tr>

                                @foreach ($membersWithTeam as $team)
                                @foreach ($team->members as $members)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            {{ $members->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                            {{ $members->level }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    {{ $membersWithTeam->links() }}
</x-layout>