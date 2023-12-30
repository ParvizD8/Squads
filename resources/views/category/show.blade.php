<x-layout>
    <div class="flex mt-20">
        <aside class="w-48 flex-shrink-0">

            <ul>
                <li class="mb-4">
                    <strong>{{ $category->name }}</strong>
                </li>

                <li class="mb-4">
                    <a href="/category/{{ $category->id }}/teams/list">Список команд</a>
                </li>

                <li class="mb-4">
                    <a href="/category/{{ $category->id }}/members/list">Список участников</a>
                </li>
            </ul>
        </aside>
    </div>
</x-layout>