<x-layout>
    <div class="flex flex-col mt-20 mb-10">
        <div class="-my-2 overflow-x-clip sm:-mx-6 lg:-mx-2">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center ml-4 text-sm font-medium text-gray-900">
                                    <a href="category/{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/category/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form method="POST" action="/category/{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-xs text-gray-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->links() }}
</x-layout>