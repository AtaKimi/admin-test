@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Add, Edit, Delete features are not functional!</strong> This is a
                <strong>PRO</strong> feature! Click <strong>
                    <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank"
                        class="text-white">here</a></strong>
                to see the PRO product!
            </span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row ">
                            <div>
                                <h5 class="mb-0">All Users</h5>
                            </div>


                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            body
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Job ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            User ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creation Date
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $comment->id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{Str::limit($comment->body, 50)}}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{$comment->user_id}}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{$comment->job_id}}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{$comment->created_at}}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit user">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                                <span>
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </span>
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
@endsection
