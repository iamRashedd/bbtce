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
            </tr>
            @endforeach
        </table>

@endsection