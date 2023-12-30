<x-layout>
    <section class="px-6 py-8 mt-20">
        <main class="max-w-lg mx-auto">
            <form method="POST" action="/category" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                            for="name">
                            Название
                    </label>

                    <input  class="border border-gray-400 p-2 w-full rounded" 
                            type="text" 
                            name="name" 
                            id="name"
                            value=""
                            required
                    >

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Создать
                </button>
            </form>
        </main>
    </section>
</x-layout>