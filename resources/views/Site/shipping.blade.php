@extends('layouts.site')
@section('title','Shipping Address')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('post.shipping')}}" method="post" class="form-group">

                {{csrf_field()}}

                <div class="form-group">

                    <label for="inputName">Name: </label>
                    <input type="text" class="form-control" name="name" id="inputName" required>
                </div>

                <div class="form-group">

                    <label for="inputAddress">Address: </label>
                    <input type="text" class="form-control" name="address" id="inputAddress" required>
                </div>

                <div class="form-group">

                    <label for="inputPhone">Your Phone: </label>
                    <input type="number" class="form-control" name="phone" id="inputPhone" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Cập nhật địa chỉ giao hàng" >
                </div>
            </form>
        </div>
    </div>

    @endsection