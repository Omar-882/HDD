<x-app-layout>
    <x-slot name="header">
        <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->F_name) }}

        </h2>
        <h3 class="font-semibold text-gray-300 leading-tight">
            {{ __($user->L_name) }}
        </h3>
        <h3 class="font-semibold text-green-300 leading-tight">
          Price:{{ __($user->wallet) }}$
        </h3>
        <h3>
            <x-success-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'edit user Modal')"
                        >{{ __('edit user') }}</x-success-button>

                        <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'delete user Modal')"
                    >{{ __('edit user') }}</x-danger-button>

                        <x-modal name="edit user Modal" focusable>
                            <form method="post" action="{{ route('users.edit',$user->id) }}" class="p-6">
                                @csrf
                                @method('post')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Fill the below Form') }}
                                </h2>

                                <div>
                                    <x-input-label for="f_name" :value="__('First Name')" />
                                    <x-text-input id="f_name" class="block mt-1 w-full" type="text" name="f_name" :value="old('f_name')" required autofocus autocomplete="f_name" />
                                    <x-input-error :messages="$errors->get('f_name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="l_name" :value="__('Last Name')" />
                                    <x-text-input id="l_name" class="block mt-1 w-full" type="text" name="l_name" :value="old('l_name')" required />
                                    <x-input-error :messages="$errors->get('l_name')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="phone" :value="__('phone')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <select id="gender" class="block mt-1 w-full" name="gender" >
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="bday" :value="__('B Day')" />
                                    <input type ="date" id="bday" class="block mt-1 w-full" name="bdayذ" required >
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
                        <x-modal name="delete user Modal" focusable>
                            <form method="post" action="{{ route('users.delete',$user->id) }}" class="p-6">
                                @csrf
                                @method('post')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Fill the below Form') }}
                                </h2>

                               <p class="text-lg font-medium text-gray-900">"are you sure "</p>


                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel')     }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('delete') }}
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
