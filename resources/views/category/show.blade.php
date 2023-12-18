<x-layout>

        <div class="flex mt-20">
            <aside class="w-48 flex-shrink-0">

                <ul>
                    <li class="mb-3">
                        <a  href="#">Все участники</a>
                    </li>

                    <li>
                        <a href="#">Добавить участника</a>
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
                                                <b>Редактировать</b>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <b>Удалить</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                                    <a href="#">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-blue-500 hover:text-blue-600">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="#">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-xs text-gray-400">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </section>
</x-layout>