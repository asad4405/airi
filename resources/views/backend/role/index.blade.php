@extends('layouts.backend_master')
@section('title')
    Role Manager
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Role List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-wrap">
                                    @foreach ($role->getPermissionNames() as $permission)
                                        <span class="my-2 badge badge-primary">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('Role Edit Permission')
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endcan
                                    @can('Role Delete Permission')
                                        <a href="{{ route('role.delete', $role->id) }}" class="btn btn-danger btn-icon">
                                            <i data-feather="trash"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">No Role Available!</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Permission</h3>
                </div>
                <div class="card-body">
                    @if (session('permission_success'))
                        <div class="alert alert-success">{{ session('permission_success') }}</div>
                    @endif
                    <form action="{{ route('role.permission.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Permission</label>
                            <input type="text" class="form-control" name="permission_name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Permission</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 card">
                <div class="card-header">
                    <h3>Add Role</h3>
                </div>
                <div class="card-body">
                    @if (session('role_success'))
                        <div class="alert alert-success">{{ session('role_success') }}</div>
                    @endif
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <input type="text" class="form-control" name="role_name">
                        </div>
                        <div class="mb-3">
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="per{{ $permission->id }}"
                                        value="{{ $permission->name }}" name="permission[]">
                                    <label for="per{{ $permission->id }}"
                                        class="ml-0 form-check-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Role</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 card">
                <div class="card-header">
                    <h3>Assign Role</h3>
                </div>
                <div class="card-body">
                    @if (session('assign_role'))
                        <div class="alert alert-success">{{ session('assign_role') }}</div>
                    @endif
                    <form action="{{ route('role.assign') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="user_id" id="" class="form-select">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" id="" class="form-select">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Assign Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
