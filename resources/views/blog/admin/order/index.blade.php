@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Панель управления @endslot
            @slot('parent') Главная @endslot
            @slot('active') Список заказов @endslot
        @endcomponent
    </section>

    {{--    Content header --}}
{{--    <section class="content-header">--}}
{{--        <h1>Список заказов</h1>--}}
{{--        <ol class="breadcrumb">--}}
{{--           <li><a href="/"><i class="fa fa-dashboard"></i>Главная</a></li>--}}
{{--           <li class="active">Список заказов</li>--}}
{{--        </ol>--}}
{{--    </section>--}}
    {{--  Main content  --}}
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Покупатель</td>
                                    <td>Статус</td>
                                    <td>Сумма</td>
                                    <td>Дата создания</td>
                                    <td>Дата изменения</td>
                                    <td>Действие</td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $order)
                                    @php $class= $order->status ? 'success' : '' @endphp
                                <tr class="{{$class}}">
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>
                                        <span class="label label-success">
                                            @if($order->status == 0)Новый@endif
                                            @if($order->status == 1)Завершен@endif
                                            @if($order->status == 2) <b style="color: red;">Удален</b>@endif
                                        </span>
                                    </td>
                                    <td>{{$order->sum}} {{$order->currency}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td>
                                        <a href="{{route('blog/admin.orders.edit', $order->id)}}"><i class="fa fa-fw fa-pencil"></i> Редактировать</a>
                                        <a href="{{route('blog.admin.orders.forcedestroy', $order->id)}}" style="color: red;"><i class="fa fa-fw fa-close deletebd" style="color: red;"></i> Удалить</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">
                                            <h2>Заказов нет</h2>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($paginator)}} заказа(ов) из {{$countOrders}}</p>

                            @if($paginator->total() > $paginator->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{$paginator->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
