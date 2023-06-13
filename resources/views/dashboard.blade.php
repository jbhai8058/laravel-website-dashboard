<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hi.. <b>{{Auth::user()->name}}</b>
            <b style="float:right;">Total Users
            <span class="badge badge-primary">{{count($users)}}</span>
            </b>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5 class="card-header">Users List</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr #</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">User No</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>                                            
                                            <td scope="">{{$user->name}}</td>
                                            <td scope="">{{$user->id}}</td>
                                            <td scope="">{{$user->email}}</td>
                                            <td scope="">
                                                @if($user->created_at == NULL)
                                                    <span class="text-danger">No Data set</span>
                                                @else
                                                    {{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
