@extends('layout.mainlayout')
@section('content')
<div>
    <table>
        <thead>
            <th> # </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Other names</th>
            <th>SSN</th>
            <th>Gender</th>
            <th>D.O.B</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($debtors as $debtor)
            <tr>
                <td>{{$debtor->id}}</td>
                <td>{{$debtor->first_name}}</td>
                <td>{{$debtor->last_name}}</td>
                <td>{{$debtor->other_names}}</td>
                <td>{{$debtor->ssn}}</td>
                <td>{{$debtor->gender}}</td>
                <td>{{$debtor->dob}}</td>
                <td>{{$debtor->status}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection