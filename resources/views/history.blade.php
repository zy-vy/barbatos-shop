@extends('app')

@section('body')
    @foreach ($transactions as $transaction)
    <div class="card mx-5 my-3">
            
        <div class="card-header">
            Transaction Date 
            {{ $transaction->created_at }}
        </div>
        <div class="card-body">
            <div class="">
                <div class="row fw-bold ">
                    <div class="col">Name</div>
                    <div class="col">quantity</div>
                    <div class="col">sub price</div>
                </div>
                @foreach ($transaction->transactionDetails as $transactionDetail)
                    <div class="row">
                        <div class="col">{{$transactionDetail->product->name}}</div>
                        <div class="col">{{$transactionDetail->sub_quantity}}</div>
                        <div class="col">IDR {{$transactionDetail->sub_total    }}</div>
                    </div>
                @endforeach
                <div class="row fw-bold fs-6">
                    <div class="col">Total</div>
                    <div class="col">{{$transaction->quantity}} item(s)</div>
                    <div class="col">IDR {{$transaction->total}}</div>
                </div>
            </div>


        </div>
    </div>
    @endforeach
    
@endsection