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
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Users</h5>
                            </div>
                            <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New
                                User</a>
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
                                            Title
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Subtitle
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Description
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Length
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Requirments
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tags
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Requester ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Taker ID
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->title }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->subtitle }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ Str::limit($job->description, 30) }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->length }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @foreach ($job->requirments as $requirment)
        <span>{{$requirment}} </span>                                                        
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @foreach ($job->tags as $tag)
                                                    <span>{{$tag}} </span>                                                        
                                                                                                @endforeach    
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->requester_id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $job->taker_id }}</p>
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
