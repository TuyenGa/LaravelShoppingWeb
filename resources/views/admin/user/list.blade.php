@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="odd gradeX" align="center">
                <td>{{ $user->id  }}</td>
                <td>{{ $user->username  }}</td>
                <td>{{ $user->email  }}</td>
                <td>{{ $user->role_id }}</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <form action="{{ url("/admin/user/").'/'.$user->id  }}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url("/admin/user/").'/'.$user->id ."/edit" }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        {{ $users->links() }}
    </div>
@endsection
