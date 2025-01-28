<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4">
    <div class="mx-auto text-center max-w-2xl mb-12">
        <h1 class="text-pretty text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">
            Shorten your URL</h1>
        <p class="mt-4 text-pretty text-lg font-medium text-gray-500">Long URLs are so old school. Let's be new school.
        </p>
    </div>

    <div class="max-w-4xl mx-auto sm:px-4">
        <form wire:submit="submit" class="flex flex-col md:flex-row items-start gap-x-4 w-full md:w-2/3 mx-auto">
            <div class="grow w-full md:w-auto">
                <label for="url" class="sr-only">URL to shorten</label>
                <input type="url" wire:model.live="url" id="url"
                    class="block w-full rounded-md border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-brand-purple"
                    placeholder="Enter URL to shorten (e.g. https://iamsolongwhyamisolongthisisridiculous.com)">
                @error('url')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" wire:loading.attr="disabled" wire:target="submit" wire:loading.class="animate-bounce"
                class="mt-2 md:mt-0.5 w-full md:w-auto py-2 px-4 text-lg font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 text-white hover:text-brand-dark bg-brand-purple hover:bg-brand-yellow sm:hover:-rotate-1 sm:hover:scale-105 duration-400 transition disabled:opacity-50">
                <span wire:loading.remove wire:target="submit">Shorten</span>
                <span wire:loading wire:target="submit">Shortening...</span>
            </button>
        </form>

        @if ($shortUrl)
        <div x-data="{ copied: false }" class="mt-4 mx-auto text-center max-w-xl flex flex-col gap-y-2">
            @if (!$smaller)
            <p class="text-pretty text-lg font-medium text-gray-500">It got bigger, wth? 🤏</p>
            @else
            <p class="text-pretty text-lg font-medium text-gray-500">It got smaller 🤏</p>
            @endif
            <div class="relative w-full border-dashed border-2 border-gray-500 rounded-md px-4 py-2">
                <a href="{{ $shortUrl }}" class="py-3 px-6 text-pretty text-lg font-medium text-gray-500">{{
                    $shortUrl }}</a>

                <span title="Click to copy to clipboard"
                    class="cursor-pointer absolute right-0 top-0 w-10 h-full bg-brand-yellow hover:bg-brand-yellow/80 transition-all duration-150 rounded-r-md flex items-center justify-center"
                    x-on:click="navigator.clipboard.writeText('{{ $shortUrl }}'); copied = true; setTimeout(() => { copied = false; }, 2000);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-brand-dark">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg></span>
                <div x-show="copied"
                    class="absolute inset-0 w-full h-full bg-brand-purple flex items-center justify-center text-pretty text-lg font-medium text-white select-none">
                    It's in your clipboard, enjoy!</div>
            </div>
        </div>
        @endif
    </div>
</div>
