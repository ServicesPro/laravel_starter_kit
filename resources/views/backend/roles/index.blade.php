@extends('layouts.backend.app')

@push('css')
<!-- DataTables -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
@include('layouts.backend.partials._breadcrumb', ['title' => 'Roles', 'previous' => "Menu"])


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary px-4 mt-0 mb-3" onclick="location.href='{{ route('app.roles.create') }}'"><i class="mdi mdi-plus-circle-outline mr-2"></i>Add New Role</button>
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Permissions</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Actions</th>
                            </tr><!--end tr-->
                        </thead>

                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center">#{{ $key + 1 }}</td>
                                <td class="text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                    @if ($role->permissions()->count() > 0)
                                        <div class="badge badge-info">{{ $role->permissions()->count() }}</div>
                                    @else
                                        <div class="badge badge-danger">No permission found :(</div>
                                    @endif
                                </td>
                                <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="../hospital/patient-edit.html" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                </td>
                            </tr><!--end tr-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->
@endsection

@push('js')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    // Datatable
    $('#datatable').DataTable();
</script>
@endpush
