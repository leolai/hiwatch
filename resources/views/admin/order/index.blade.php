@extends('admin.framework.main')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    订单管理 - 列表
                </div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <select name="status">
                                @foreach($status as $key => $value)
                                    <option value="{{$value}}">@lang($key)</option>
                                @endforeach
                            </select>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('order.user')</td>
                                <td>@lang('order.amount')</td>
                                <td>@lang('order.time')</td>
                                <td>@lang('comm.option')</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td><a href="/admin/user/{{$order->user->id}}">{{$order->user->name}}</a></td>
                                    <td>{{$order->order_amount}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <a href="/admin/order/{{$order->id}}">@lang('btn.view')</a>
                                        <a href="/admin/order/{{$order->id}}">@lang('btn.edit')</a>
                                        <form>
                                            <input type="submit" value="@lang('btn.edit')"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $orders->render() !!}
                </div>
            </div>


        </div>
    </div>
@endsection