@extends('layouts.dashboard')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ $subtitle }}
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Tasks
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Index
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title">Employee List</h5>
                        <a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary ms-auto rounded-cs"><i
                                class="bi bi-plus"></i>
                            Add New</a>
                    </div>
                </div>
                <div class="card-body">

                    <x-sweetalertsession />

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Birth Date</th>
                                <th>Hire Date</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Salary</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->fullname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->birth_date->format('d F Y') }}</td>
                                    <td>{{ $employee->hire_date->format('d F Y') }}</td>
                                    <td>{{ $employee->department->name }}</td>
                                    <td>{{ $employee->role->title }}</td>
                                    <td>
                                        @if ($employee->status == 'active')
                                            <span class="badge bg-success rounded-cs">Active</span>
                                        @else
                                            <span class="badge bg-danger rounded-cs">Inactive</span>
                                        @endif
                                    </td>
                                    <td>$ {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm rounded-cs dropdown-toggle me-1"
                                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton"
                                                    style="min-width: 40px;">
                                                    <a href="{{ route('employees.show', $employee->id) }}"
                                                        class="dropdown-item btn btn-sm text-white mb-1 rounded-cs"
                                                        style="background-color:#0dcaf0;">
                                                        <i class="bi bi-eye me-1"></i> View
                                                    </a>

                                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                                        class="dropdown-item btn btn-sm text-white mb-1 rounded-cs"
                                                        style="background-color:#0d6efd;">
                                                        <i class="bi bi-pencil me-1"></i> Edit
                                                    </a>

                                                    <form id="form-delete-{{ $employee->id }}" method="POST"
                                                        class="d-inline"
                                                        action="{{ route('employees.destroy', $employee->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="dropdown-item btn btn-sm text-white rounded-cs"
                                                            data-swal-form-id="form-delete-{{ $employee->id }}"
                                                            style="background-color:#dc3545;">
                                                            <i class="bi bi-trash me-1"></i> Delete
                                                        </button>
                                                    </form>

                                                    <x-sweetalertaction form-id="form-delete-{{ $employee->id }}"
                                                        action="delete" />

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </section>
    @endsection
