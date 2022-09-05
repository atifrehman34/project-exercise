@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
        <h1 class="display-3">Borrowers</h1>    
      
        <div style="text-align: right; margin-bottom: 10px;">
          <a href="{{ route('borrower.create')}}" class="btn btn-primary">Add Borrower</a>
        </div>

      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Step</td>
              <td>Steps</td>
              <td>Monthly Sales</td>
              <td>Monthly Expense</td>
              <td>Other Finance</td>
              <td>Business Name </td>
              <td>Business Address</td>
              <td>Business City</td>
              <td>Business State</td>
              <td>Email</td>
              <td>DOB</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($borrower as $borrower)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$borrower->step}}</td>
                <td>{{$borrower->steps}}</td>
                <td>{{$borrower->monthly_sales}}</td>
                <td>{{$borrower->monthly_expenses}}</td>
                <td>{{$borrower->other_financing_amount}}</td>
                <td>{{$borrower->legal_business_name}}</td>
                <td>{{$borrower->business_physical_address}}</td>
                <td>{{$borrower->business_physical_city}}</td>
                <td>{{$borrower->business_physical_province}}</td>
                <td>{{$borrower->email}}</td>
                <td>{{$borrower->dob}}</td>

                <td>
                    <a href="{{ route('borrower.edit',$borrower->id)}}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{ route('borrower.destroy', $borrower->id)}}" onsubmit="return confirm('Are you sure?')" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
  </div>
</div>
@endsection