@extends('admin.master',['menu'=>'transaction', 'sub_menu'=>'transaction_withdrawal'])
@section('title', isset($title) ? $title : '')
@section('style')
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="custom-breadcrumb">
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>{{__('Transaction History')}} </li>
                    <li class="active-item">{{__('Withdrawal History')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- User Management -->
    <div class="user-management wallet-transaction-area">
        <div class="row no-gutters">
            <div class="col-12 col-lg-2">
                <ul class="nav wallet-transaction user-management-nav mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-deposit-tab" data-toggle="pill" href="#pills-deposit"
                            role="tab" aria-controls="pills-deposit" aria-selected="true">
                            {{__('Pending Withdrawal List')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-withdraw-tab" data-toggle="pill" href="#pills-withdraw"
                            role="tab" aria-controls="pills-withdraw" aria-selected="true">
                            {{__('Rejected Withdrawal List')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-success-withdraw-tab" data-toggle="pill"
                            href="#pills-success-withdraw" role="tab" aria-controls="pills-success-withdraw"
                            aria-selected="true">
                            {{__('Active Withdrawal List')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-10">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel"
                            aria-labelledby="pills-deposit-tab">
                        <div class="table-area">
                            <div class="table-responsive">
                                <table id="table" class="table table-borderless custom-table display text-left"
                                        width="100%">
                                    <thead>
                                    <tr>
                                        <th class="all">{{__('Type')}}</th>
                                        <th>{{__('Sender')}}</th>
                                        <th>{{__('Coin Type')}}</th>
                                        <th>{{__('Coin API')}}</th>
                                        <th>{{__('Address')}}</th>
                                        <th>{{__('Receiver')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Fees')}}</th>
                                        <th class="all">{{__('Transaction Id')}}</th>
                                        <th>{{__('Update Date')}}</th>
                                        <th class="all">{{__('Actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-withdraw" role="tabpanel"
                            aria-labelledby="pills-withdraw-tab">
                        <div class="table-area">
                            <div class="table-responsive">
                                <table id="reject-withdrawal"
                                        class="table table-borderless custom-table display text-left" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="all">{{__('Type')}}</th>
                                        <th class="all">{{__('Sender')}}</th>
                                        <th>{{__('Coin Type')}}</th>
                                        <th>{{__('Coin API')}}</th>
                                        <th>{{__('Address')}}</th>
                                        <th>{{__('Receiver')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Fees')}}</th>
                                        <th class="all">{{__('Transaction Id')}}</th>
                                        <th>{{__('Update Date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-success-withdraw" role="tabpanel"
                            aria-labelledby="pills-success-withdraw-tab">
                        <div class="table-area">
                            <div class="table-responsive">
                                <table id="success-withdrawal"
                                        class="table table-borderless custom-table display text-left" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="all">{{__('Type')}}</th>
                                        <th class="all">{{__('Sender')}}</th>
                                        <th>{{__('Coin Type')}}</th>
                                        <th>{{__('Coin API')}}</th>
                                        <th>{{__('Address')}}</th>
                                        <th>{{__('Receiver')}}</th>
                                        <th>{{__('Amount')}}</th>
                                        <th>{{__('Fees')}}</th>
                                        <th class="all">{{__('Transaction Id')}}</th>
                                        <th>{{__('Update Date')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /User Management -->
@endsection

@section('script')
    <script>
        (function($) {
            "use strict";

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                ajax: '{{route('adminPendingWithdrawal')}}',
                order: [9, 'desc'],
                autoWidth: false,
                language: {
                    paginate: {
                        next: 'Next &#8250;',
                        previous: '&#8249; Previous'
                    }
                },
                columns: [
                    {"data": "address_type"},
                    {"data": "sender"},
                    {"data": "coin_type"},
                    {"data": "network_type"},
                    {"data": "address"},
                    {"data": "receiver"},
                    {"data": "amount"},
                    {"data": "fees"},
                    {"data": "transaction_hash"},
                    {"data": "updated_at"},
                    {"data": "actions"}
                ]
            });


            $('#reject-withdrawal').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                ajax: '{{route('adminRejectedWithdrawal')}}',
                order: [9, 'desc'],
                autoWidth: false,
                language: {
                    paginate: {
                        next: 'Next &#8250;',
                        previous: '&#8249; Previous'
                    }
                },
                columns: [
                    {"data": "address_type"},
                    {"data": "sender"},
                    {"data": "coin_type"},
                    {"data": "network_type"},
                    {"data": "address"},
                    {"data": "receiver"},
                    {"data": "amount"},
                    {"data": "fees"},
                    {"data": "transaction_hash"},
                    {"data": "updated_at"},
                ]
            });


            $('#success-withdrawal').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                ajax: '{{route('adminActiveWithdrawal')}}',
                order: [9, 'desc'],
                autoWidth: false,
                language: {
                    paginate: {
                        next: 'Next &#8250;',
                        previous: '&#8249; Previous'
                    }
                },
                columns: [
                    {"data": "address_type"},
                    {"data": "sender"},
                    {"data": "coin_type"},
                    {"data": "network_type"},
                    {"data": "address"},
                    {"data": "receiver"},
                    {"data": "amount"},
                    {"data": "fees"},
                    {"data": "transaction_hash"},
                    {"data": "updated_at"},
                ]
            });
        })(jQuery);
    </script>
@endsection
