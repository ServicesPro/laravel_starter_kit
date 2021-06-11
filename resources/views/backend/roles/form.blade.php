@extends('layouts.backend.app')

@section('content')

<?php $title = isset($role) ? "Edit Role" : "Create Role" ?>

@include('layouts.backend.partials._breadcrumb', ['title' => $title, 'previous' => "Roles", 'link' => 'app.roles.index',])

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary px-4 mt-0 mb-3" onclick="location.href='{{ route('app.roles.index') }}'"><i class="fas fa-arrow-circle-left mr-2"></i>Back to list</button>

                @if ($errors->any())
                    <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>

                    @foreach ($errors->all() as $error)
                        <div class="mt-2 alert icon-custom-alert alert-outline-pink fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon"></i>
                            <div class="alert-text">
                                {{ $error }}
                            </div>

                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}">
                    @csrf
                    @if (isset($role))
                        @method('PATCH')
                    @endif
                    <div class="form-group">
                        <label for="name">Role name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name ?? old('name') }}" required autofocus placeholder="Enter a role name">
                    </div>

                    <div class="text-center">
                        <Strong>Manage permissions for role</Strong>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="permissions[]" value="-99" id="select-all">
                        <label class="form-check-label" for="select-all">Select All</label>
                    </div>

                    @forelse ($modules->chunk(2) as $key => $chunks)
                        <div class="form-row">
                            @foreach ($chunks as $key => $module)
                                <div class="col">
                                    <h5>Module: {{ $module->name }}</h5>
                                    @foreach ($module->permissions as $key => $permission)
                                        <div class="mb-3 ml-4">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" value="{{ $permission->id }}" name="permissions[]" id="permission-{{ $permission->id }}"
                                                @isset($role)
                                                    @foreach ($role->permissions as $rPermission)
                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                    @endforeach
                                                @endisset>
                                                <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="row">
                            <div class="col text-center">No module found</div>
                        </div>
                    @endforelse

                    <button type="submit" class="btn btn-primary">
                        @isset($role)
                            <i class="fas fa-arrow-circle-up mr-2"></i>Update
                        @else
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>Submit
                        @endisset
                    </button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->

@endsection

@push('js')
<script>
    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });
</script>
@endpush
