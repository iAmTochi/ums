@extends('layouts.user')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Users Table</h4>
                    <p class="card-category"> Registered users on UMS</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                S/N
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Position
                            </th>
                            <th>
                                Department
                            </th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{++$count}}
                                </td>
                                <td>
                                    <img src="{{ (!empty($user->image))? asset('storage/'.$user->image) : Gravatar::src($user->email) }}" class="rounded-circle" width="60" />
                                </td>
                                <td>
                                    {{ $user->first_name.' '.$user->last_name }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>
                                <td>
                                    {{ $user->position }}
                                </td>
                                <td>
                                    {{ $user->department }}
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

@endsection
