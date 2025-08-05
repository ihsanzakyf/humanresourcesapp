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
                                <a href="{{ route('tasks.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Leave Requests
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Leave Request</h5>
            </div>
            <x-sweetalertsession />
            <div class="card-body">
                <form action="{{ route('leave-requests.update', $leaveRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee</label>
                        <select name="employee_id"
                            class="form-select form-select-sm rounded-cs select2 @error('employee_id') is-invalid @enderror"
                            id="employee_id">
                            <option value="" disabled selected>--Select Employee--</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $leaveRequest->employee_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->fullname }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="leave_type" class="form-label">Leave Type</label>
                        <select name="leave_type" id="leave_type"
                            class="form-select form-select-sm rounded-cs @error('leave_type') is-invalid @enderror">
                            <option value="" disabled
                                {{ old('leave_type', $leaveRequest->leave_type) ? '' : 'selected' }}>--Select Leave Type--
                            </option>
                            <option value="sick" {{ old('leave_type') == 'sick' ? 'selected' : '' }}>Sick</option>
                            <option value="vacation"
                                {{ old('leave_type', $leaveRequest->leave_type) == 'vacation' ? 'selected' : '' }}>Vacation
                            </option>
                            <option value="maternity"
                                {{ old('leave_type', $leaveRequest->leave_type) == 'maternity' ? 'selected' : '' }}>
                                Maternity
                            </option>
                        </select>
                        @error('leave_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="text" name="start_date" id="start_date"
                            class="form-control form-control-sm rounded-cs date @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date', $leaveRequest->start_date) }}" placeholder="Start Date">
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="text" name="end_date" id="end_date"
                            class="form-control form-control-sm rounded-cs date @error('end_date') is-invalid @enderror"
                            value="{{ old('end_date', $leaveRequest->end_date) }}" placeholder="End Date">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <a href="{{ route('leave-requests.index') }}" class="btn btn-sm rounded-cs btn-secondary"><i
                                class="bi bi-arrow-left"></i> Back to List</a>
                        <button type="submit" class="btn btn-sm rounded-cs btn-primary"><i class="bi bi-upload"></i>
                            Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
