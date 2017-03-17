@extends('admin.master')
@section('controller','Product')
@section('action','Add')
@section('content')
                 <form action="{{ url('admin/product')  }}" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('admin.blocks.error')

                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

                            {{
                               \App\Helper\EnginerTemplate::select([
                                     "label" => "Category",
                                     "name" => "cate_id",
                                     "val-name" =>"name",
                                     "val-data" =>"id",
                                     "datas" => $category
                               ],$errors)
                            }}

                            {{
                                   \App\Helper\EnginerTemplate::input([
                                         "label" => "Name",
                                         "name" => "name",
                                         "placeholder" =>  "Please Enter Username",
                                   ],$errors)
                              }}
                            {{
                                  \App\Helper\EnginerTemplate::input([
                                        "label" => "Price",
                                        "name" => "price",
                                        "placeholder" =>  "Please Enter Price",
                                  ],$errors)
                             }}
                            {{
                                 \App\Helper\EnginerTemplate::input([
                                       "label" => "PriceSale",
                                       "name" => "pricesale",
                                       "placeholder" =>  "Please Enter PriceSale",
                                 ],$errors)
                            }}
                            {{
                                  \App\Helper\EnginerTemplate::textarea([
                                        "label" => "Content",
                                        "name" => "content",
                                        "rows"=>"4"
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
                                 ],$errors)
                            }}
                            {{
                                 \App\Helper\EnginerTemplate::textarea([
                                       "label" => "Product Description",
                                       "name" => "description",
                                       "rows"=>"4"
                                 ],$errors)
                           }}
                            {{
                                     \App\Helper\EnginerTemplate::input([
                                           "label" => "Company",
                                           "name" => "company",
                                            "placeholder" =>  "Please Enter Company",
                                     ],$errors)
                           }}

                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                    </div>

       </form>


   @endsection