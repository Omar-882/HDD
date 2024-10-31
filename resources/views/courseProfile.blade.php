<x-app-layout>
    <x-slot name="header">
        <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($cors->c_name) }}

        </h2>
        <h3 class="font-semibold text-gray-300 leading-tight">
            {{ __($cors->descrption) }}
        </h3>
        <h3 class="font-semibold text-green-300 leading-tight">
          Price:{{ __($cors->price) }}$
        </h3>
        <h3>
            <x-success-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'edit Course Modal')"
                        >{{ __('edit course') }}</x-success-button>

                        <x-modal name="edit Course Modal" focusable>
                            <form method="post" action="{{ route('courses.edit',$cors->id) }}" class="p-6">
                                @csrf
                                @method('post')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Fill the below Form') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">

                                </p>

                                <div class="mt-6">
                                    <label for="c_name"  class="sr-only" >Course Name </label>

                                    <x-text-input
                                        id="c_name"
                                        name="c_name"
                                        value="{{$cors->c_name}}"
                                        type="text"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Course Name') }}"
                                    />
                                    <x-text-input
                                    id="des"
                                    name="des"
                                    value="{{$cors->descrption}}"
                                    type="text"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Description') }}"
                                />
                                <x-text-input
                                id="price"
                                name="price"
                                value="{{$cors->price}}"
                                type="text"
                                class="mt-1 block w-3/4"
                                placeholder="{{ __('price') }}"
                            />
                                    <select name="isDeleted" id="">

                                        <option value="0" @if($cors->is_deleted == 0) selected @endif>Active</option>
                                        <option value="1" @if($cors->is_deleted != 0) selected @endif>InActive</option>
                                    </select>
                                    <input type="checkbox"@if($cors->is_deleted == 1) checked @endif name="" id="">
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel')     }}
                                    </x-secondary-button>

                                    <x-success-button class="ms-3">
                                        {{ __('edit') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
        </h3>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
