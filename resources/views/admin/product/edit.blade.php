@extends('admin.master')
@section('controller','Product')
@section('action','Edit')
@section('content')
    <form action="{{ url('admin/product')."/".$product->id  }}" method="POST" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.error')
            {{ method_field("PUT") }}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

            {{
               \App\Helper\EnginerTemplate::select([
                     "label" => "Category",
                     "name" => "cate_id",
                     "val-name" =>"name",
                     "val-data" =>"id",
                     "value" => $product->cate_id,
                     "datas" => $categories
               ],$errors)
            }}

            {{
                   \App\Helper\EnginerTemplate::input([
                         "label" => "Name",
                         "name" => "name",
                         "placeholder" =>  "Please Enter Username",
                          "value" => $product->name
                   ],$errors)
              }}
            {{
                  \App\Helper\EnginerTemplate::input([
                        "label" => "Price",
                        "name" => "price",
                        "placeholder" =>  "Please Enter Price",
                         "value" => $product->price
                  ],$errors)
             }}
            {{
                 \App\Helper\EnginerTemplate::input([
                       "label" => "PriceSale",
                       "name" => "pricesale",
                       "placeholder" =>  "Please Enter PriceSale",
                        "value" => $product->pricesale
                 ],$errors)
            }}
            {{
                  \App\Helper\EnginerTemplate::textarea([
                        "label" => "Content",
                        "name" => "content",
                        "rows"=>"4",
                         "value" => $product->content
                  ],$errors)
            }}
            <script type="text/javascript">ckeditor("content")</script>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="image">
            </div>

            {{
                 \App\Helper\EnginerTemplate::input([
                       "label" => "Product Keywords",
                       "name" => "keyword",
                       "placeholder" =>  "Please Enter Keywords",
                       "value" => $product->keyword
                 ],$errors)
            }}
            {{
                 \App\Helper\EnginerTemplate::textarea([
                       "label" => "Product Description",
                       "name" => "description",
                       "rows"=>"4",
                       "value" => $product->description
                 ],$errors)
           }}
            {{
                     \App\Helper\EnginerTemplate::input([
                           "label" => "Company",
                           "name" => "company",
                            "placeholder" =>  "Please Enter Company",
                            "value" => $product->company
                     ],$errors)
           }}

            <button type="submit" class="btn btn-default">Save Edit</button>
        </div>

    </form>


@endsection