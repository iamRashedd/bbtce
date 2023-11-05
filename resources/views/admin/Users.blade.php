@extends('layout.theme')

@section('content')

        <table border=1>
            <tr>
                <th>
                    Account Picture
                </th>
                <th>
                    Account ID
                </th>
                <th>
                    Account First Name
                </th>
                <th>
                    Account Last Name
                </th>
                <th>
                    Account Email
                </th>
                <th>
                    Account Username
                </th>
                <th>
                    Account Role
                </th>
                <th>
                    Account Status
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


            @foreach($users as $user)
            <tr>
                <td>
                    <img class="" width="50px" src="../../assets/uploads/{{$user->profile->photo}}">
                </td>
                <td>
                    {{$user->profile->account_number}}
                </td>
                <td>
                    {{$user->profile->first_name}}
                </td>
                <td>
                    {{$user->profile->last_name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->role}}
                </td>
                <td>
                    {{$user->status}}
                </td>
                <td>
                    {{$user->profile->username}}
                </td>
                <td>
                    {{$user->profile->balanceBDT}}
                </td>
                <td>
                    {{$user->profile->balanceUSD}}
                </td>
                <td>
                    {{$user->profile->balanceETH}}
                </td>
                @if($user->isActive())
                <td>
                    <button disabled><a href="#">Active</a>
                </td>
                <td>
                    <button><a href="/admin/deactivate/user/{{$user->id}}">Deactivate</a>
                </td>
                @else
                <td>
                    <button><a href="/admin/activate/user/{{$user->id}}">Active</a>
                </td>
                <td>
                    <button disabled><a href="#">Deactivate</a>
                </td>
                @endif
                <td>
                    <button><a href="/admin/delete/user/{{$user->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>

        <br>
        <button><a href="/">Home</a></button>

@endsection