@extends('layouts.backend.app')

@push('css')
<!-- DataTables -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Sweet Alert -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
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
                                        <div class="badge badge-soft-success">{{ $role->permissions()->count() }}</div>
                                    @else
                                        <div class="badge badge-soft-danger">No permission found :(</div>
                                    @endif
                                </td>
                                <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('app.roles.edit', $role->id) }}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    @if ($role->deletable)
                                        <a onclick="deleteData({{ $role->id }})" href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('app.roles.destroy', $role->id) }}" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
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
<!-- Sweet-Alert  -->
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
{{-- <script src="{{ asset('assets/pages/jquery.sweet-alert.init.js') }}"></script> --}}
<script>
    // Datatable
    $('#datatable').DataTable();

    function deleteData(id) {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Cancelled',
                    'Your role is safe :)',
                    'error'
                )
            }
        });
    }
</script>
@endpush
