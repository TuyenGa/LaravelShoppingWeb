@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                         @foreach($data as $item)
                            <?php $stt = $stt + 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!}</td>
                                <td>{!! $item["name"] !!}</td>
                                <td>
                                    @if($item["prarent_id"]==0)
                                        {!! "None" !!}
                                    @else
                                        <?php
                                        $parent = DB::table('categories')->where('id',$item["prarent_id"])->first();ì
                                        echo $parent->name;
                                        ?>
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                        @endforeach

                        </tbody>
    </table>

@endsection

