<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Admin Users</h2>
                    <table class="table table-striped"> <thead class="thead-dark">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                             <th scope="col">Role</th>
                              <th scope="col">Wallet</th>
                              <th scope="col">IsActive</th>
                              <th scope="col">Details</th>
                             </tr>
                            </thead>
                             <tbody>
                                 @foreach ($c as $user)
                                  <tr>
                                    <td>{{ $user->F_name }}</td>
                                     <td>{{ $user->L_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->wallet }}</td>
                                    @if($user->is_deleted==1)
                                    <td>InActive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                <td><a href="{{route('courses.show',$user->id)}}"><x-success-button
                                >{{ __('Details') }}</x-success-button></a></td>
                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                </div>
                <div class="p-6 text-gray-900">
                    <h2>Couches Users</h2>
                    <table class="table table-striped"> <thead class="thead-dark">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                             <th scope="col">Role</th>
                              <th scope="col">Wallet</th>
                              <th scope="col">IsActive</th>
                              <th scope="col">Details</th>
                             </tr>
                            </thead>
                             <tbody>
                                 @foreach ($ch as $user)
                                  <tr>
                                    <td>{{ $user->F_name }}</td>
                                     <td>{{ $user->L_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->wallet }}</td>
                                    @if($user->is_deleted==1)
                                    <td>InActive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                <td><a href="{{route('courses.show',$user->id)}}"><x-success-button
                                >{{ __('Details') }}</x-success-button></a></td>
                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                </div>
                <div class="p-6 text-gray-900">
                    <h2>Students</h2>
                    <table class="table table-striped"> <thead class="thead-dark">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                             <th scope="col">Role</th>
                              <th scope="col">Wallet</th>
                              <th scope="col">IsActive</th>
                              <th scope="col">Details</th>
                             </tr>
                            </thead>
                             <tbody>
                                 @foreach ($s as $user)
                                  <tr>
                                    <td>{{ $user->F_name }}</td>
                                     <td>{{ $user->L_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->wallet }}</td>
                                    @if($user->is_deleted==1)
                                    <td>InActive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                <td><a href="{{route('courses.show',$user->id)}}"><x-success-button
                                >{{ __('Details') }}</x-success-button></a></td>
                                </tr>
                                  @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
