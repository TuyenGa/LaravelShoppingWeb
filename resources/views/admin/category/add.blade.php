@extends('admin.master')
@section('controller','Category')
@section('action','getAdd')
@section('content')


    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        <form action="{!!  url("/admin/category") !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="prarent_id">
                    <option value="0">Please choose category</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{$item->name }}</option>
                    @endforeach
                </select>
            </div>
            {{
                  \App\Helper\EnginerTemplate::input([
                        "label" => "Category Name",
                        "name" => "name"
                  ],$errors)
            }}
            {{
                  \App\Helper\EnginerTemplate::input([
                        "label" => "Category Keywords",
                        "name" => "keyword",
                        "placeholder" =>  "Please Enter Category Keywords"
                  ],$errors)
            }}
            <div class="form-group">
                <label>Category Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>

@endsection