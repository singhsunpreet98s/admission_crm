<x-guest-layout>
   <form method="POST" action="{{route("$section.verifyApplicationStatus")}}">
       @csrf
       <input type="hidden" name="id" value="{{$registration->id}}" />
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$registration->student_name}}"  disabled/>
        </div>
        <div>
            <x-input-label for="fathers_name" :value="__('Fathers Name')" />
            <x-text-input id="fathers_name" class="block mt-1 w-full" type="text" name="fathers_name" value="{{$registration->fathers_name}}"  disabled/>
        </div>
        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{$registration->domincile}}"  disabled/>
        </div>
        <div>
            <x-input-label for="college" :value="__('College')" />
            <x-text-input id="college" class="block mt-1 w-full" type="text" name="college" value="{{$registration->college_name}}"  disabled/>
        </div>
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-3">
                {{ __('Procced') }}
            </x-primary-button>
        </div>
   </form>
</x-guest-layout>