<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Course   ') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Add New Course.') }}
                            </p>
                        </header>

                        <x-success-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'New Course Modal')"
                        >{{ __('Create New course') }}</x-success-button>

                        <x-modal name="New Course Modal" focusable>
                            <form method="post" action="{{ route('courses.add') }}" class="p-6">
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
                                        type="text"
                                        class="mt-1 block w-3/4"
                                        placeholder="{{ __('Course Name') }}"
                                    />
                                    <x-text-input
                                    id="des"
                                    name="des"
                                    type="text"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Description') }}"
                                />
                                <x-text-input
                                id="price"
                                name="price"
                                type="text"
                                class="mt-1 block w-3/4"
                                placeholder="{{ __('price') }}"
                            />

                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-success-button class="ms-3">
                                        {{ __('Create') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped"> <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                             <th scope="col">Description</th>
                              <th scope="col">Price</th>
                              <th scope="col">is delted</th>
                              <th scope="col">Details</th>
                             </tr>
                            </thead>
                             <tbody>
                                 @foreach ($c as $course)
                                  <tr>
                                    <td>{{ $course->c_name }}</td>
                                     <td>{{ $course->descrption }}</td>
                                    <td>{{ $course->price }}</td>
                                    @if($course->is_deleted==1)
                                    <td>InActive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                <td><a href="{{route('courses.show',$course->id)}}"><x-success-button
                                >{{ __('Details') }}</x-success-button></a></td>
                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
    {{ $c->links() }}
</x-app-layout>
