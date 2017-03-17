@extends('admin.master')
@section('controller','Category')
@section('action','Edit')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ url("admin/category").'/'.$category->id  }}" method="POST">
                        {{ method_field("PUT") }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control" name="prarent_id">
                                <option value="0">Please choose category</option>
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}" {{ ($category->prarent_id == $item->id )? "selected" : "" }}>{{$item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{
                             \App\Helper\EnginerTemplate::input([
                                   "label" => "Category Name",
                                   "name" => "name",
                                   "placeholder" =>  "Please Enter Category Name",
                                   "value" => $category->name
                             ],$errors)
                        }}
                        {{
                              \App\Helper\EnginerTemplate::input([
                                    "label" => "Category Keywords",
                                    "name" => "keyword",
                                    "placeholder" =>  "Please Enter Category Keywords",
                                    "value" => $category->keyword
                              ],$errors)
                        }}
                        {{
                             \App\Helper\EnginerTemplate::textarea([
                                   "label" => "Category Description",
                                   "name" => "description",
                                   "rows"=>"4",
                                   "value" => $category->description
                             ],$errors)
                       }}
                        <button type="submit" class="btn btn-default">Category Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()