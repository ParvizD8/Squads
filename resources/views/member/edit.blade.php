<x-layout>
    <section class="px-6 py-8 mt-20">
        <main class="max-w-lg mx-auto">
            <form method="POST" action="/member/{{ $member->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Имя игрока
                    </label>

                    <input class="border border-gray-400 p-2 w-full rounded" type="text" name="name" id="name" value="{{ $member->name }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="level">
                        Навыки игрока по 10 бальной шкале
                    </label>

                    <input class="border border-gray-400 p-2 w-full rounded" type="number" name="level" id="level" value="{{ $member->level }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Категория
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="mt-5 bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Изменить
                </button>

            </form>
        </main>
    </section>
</x-layout>