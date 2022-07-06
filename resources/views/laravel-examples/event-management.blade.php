@extends('layouts.user_type.auth')

@section('content')
    <div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All event</h5>
                        </div>

                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Start date
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        End date
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $event->id }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $event->title }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ Str::limit($event->description, 50) }}
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $event->start_date }}</span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $event->end_date }}</p>
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
