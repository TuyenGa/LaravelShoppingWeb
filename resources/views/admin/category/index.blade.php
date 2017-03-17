@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0?>
        @foreach($categories as $item)
            <?php $stt = $stt + 1 ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item->name !!}</td>
                <td>
                    @if($item->prarent_id==0)
                        {!! "None" !!}
                    @else
                        <?php
                        $parent = DB::table('categories')->where('id',$item->prarent_id)->first();
                        echo $parent->name;
                        ?>
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                    <form action="{{ url("/admin/category/").'/'.$item->id  }}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url("/admin/category/").'/'.$item->id ."/edit" }}">Edit</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="row">
        {{ $categories->links() }}
    </div>
@endsection

