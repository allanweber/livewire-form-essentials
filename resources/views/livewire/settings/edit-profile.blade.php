<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Edit Bio')" :subheading="__('Edit your bio information')">
        <div>
            <form wire:submit="save" class="flex flex-col">
                <label class="flex flex-col gap-2">
                    <h3 class="font-medium text-slate-700 text-base">Name</h3>

                    <input
                        wire:model.blur="form.name"
                        @class([
                            'px-3 py-2 rounded-lg',
                            'border border-slate-300' => $errors->missing('form.name'),
                            'border-2 border-red-500' => $errors->has('form.name'),
                        ])
                        placeholder="Name...">
                    <p class="text-sm text-red-500">
                        @error('form.name') {{ $message }} @enderror
                    </p>
                </label>

                <label class="flex flex-col gap-2">
                    <h3 class="font-medium text-slate-700 text-base">Bio</h3>

                    <textarea
                        wire:model="form.bio"
                        rows="4"
                        @class([
                            'px-3 py-2 rounded-lg',
                            'border border-slate-300' => $errors->missing('form.bio'),
                            'border-2 border-red-500' => $errors->has('form.bio'),
                        ])
                        placeholder="A little bit about yourself..."></textarea>
                        <p class="text-sm text-red-500">
                            @error('form.bio') {{ $message }} @enderror
                        </p>
                </label>

                <div class="flex">
                    <button type="submit"
                        class="relative w-full bg-blue-500 py-3 px-8 rounded-lg text-white font-medium disabled:cursor-not-allowed disabled:opacity-75">
                        Save

                        <div wire:loading.flex wire:target="save" class="absolute top-0 right-0 bottom-0 items-center pr-4">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>
                    </button>
                </div>
            </form>

            <!-- Success Indicator... -->
            <div x-show="$wire.showSuccessIndicator" x-transition.out.opacity.duration.2000ms
                x-effect="if($wire.showSuccessIndicator) setTimeout(() => $wire.showSuccessIndicator = false, 3000)"
                class="flex justify-end pt-4">
                <div class="flex gap-2 items-center text-green-500 text-sm font-medium">
                    Profile updated successfully

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

        </div>
    </x-settings.layout>
</section>
