@extends('layout.theme')

@section('content')

        <table border=1>
            <tr>
                <th>
                    Account ID
                </th>
                <th>
                    Account Name
                </th>
                <th>
                    BDT Balance 
                </th>
                <th>
                    USD Balance 
                </th>
                <th>
                    ETH Balance 
                </th>
                <th colspan="3">
                    Operations
                </th>
            </tr>


            @foreach($profiles as $profile)
            <tr>
                <td>
                    {{$profile->account_number}}
                </td>
                <td>
                    {{$profile->first_name.' '.$profile->last_name}}
                </td>
                <td>
                    {{$profile->balanceBDT}}
                </td>
                <td>
                    {{$profile->balanceUSD}}
                </td>
                <td>
                    {{$profile->balanceETH}}
                </td>
                <td>
                    <button><a href="">Active</a>
                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            @endforeach
        </table>

        <br>
        <button><a href="/">Home</a></button>

@endsection