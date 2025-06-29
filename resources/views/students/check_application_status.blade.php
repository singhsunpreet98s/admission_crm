<x-guest-layout>
   <form method="POST" action="{{route("$section.verifyApplicationStatus")}}">
       @csrf
        <div>
            <x-input-label for="res_no" :value="__('Res No')" />
            <x-text-input id="res_no" class="block mt-1 w-full" type="text" name="res_no" :value="old('res_no')" required autofocus placeholder="Enter Res No"/>
            <x-input-error :messages="$errors->get('res_no')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-3">
                {{ __('Check Application') }}
            </x-primary-button>
        </div>
   </form>
</x-guest-layout>