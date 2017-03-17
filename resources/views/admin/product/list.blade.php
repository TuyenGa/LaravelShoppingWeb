@extends('admin.master')
@section('controller','Product')
@section('action','List')
@section('content')
        <!-- Page Content -->

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 0?>
                        @foreach($products as $item)
                            <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>{!! number_format($item["price"],0,",",".") !!} VND</td>
                                <td>
                                    {!! \Carbon\Carbon::createFromTimestamp(strtotime($item["created_at"]))->diffForHumans() !!}
                                </td>
                                <td>
                                    <?php $cate =DB::table('categories')->where('id',$item["cate_id"])->first(); ?>
                                    @if(!empty($cate->name))
                                        {!! $cate->name !!}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <form action="{{ url("/admin/product/").'/'.$item->id  }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        <button type="submit" class="btn btn-danger"> Delete </button>
                                    </form>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url("/admin/product/").'/'.$item->id ."/edit" }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

@endsection