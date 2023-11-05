@extends('layout.theme')

@section('content')

        <table border=1>
            <tr>
                <th>
                    Sender Account Number
                </th>
                <th>
                    Reciever Account Number 
                </th>
                <th>
                    Transaction Type
                </th>
                <th>
                    Transaction Status
                </th>
                <th>
                    Remarks
                </th>
                <th>
                    Transaction Amount 
                </th>
                <th>
                    Transaction Currency 
                </th>
                <th>
                    Current Balance 
                </th>
                <th>
                    Current Balance Currency 
                </th>
                <th>
                    Transaction Time 
                </th>
                
            </tr>

            @foreach($transactions as $transaction)
            <tr>
                <td>
                    {{$transaction->sender_account_number}}
                </td>
                <td>
                    {{$transaction->reciever_account_number}}
                </td>
                <td>
                    {{$transaction->type}}
                </td>
                <td>
                    {{$transaction->status}}
                </td>
                <td>
                    {{$transaction->remarks}}
                </td>
                <td>
                    {{$transaction->amount}}
                </td>
                <td>
                    {{$transaction->currency}}
                </td>
                <td>
                    {{$transaction->current_balance}}
                </td>
                <td>
                    {{$transaction->current_balance_currency}}
                </td>
                <td>
                    {{$transaction->created_at}}
                </td>
            </tr>
            @endforeach
        </table>

        <br>
        <button><a href="/">Home</a></button>

@endsection