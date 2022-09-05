@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8 offset-sm-2">
          <h3 >Update a borrower</h3>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          <br /> 
          @endif
          <form method="post" action="{{ route('borrower.update', $borrower->id) }}">
              @method('PATCH') 
              @csrf
                  <div class="form-group">    
                      <label for="step">Step</label>
                      <input type="number" id="step" min="0" class="form-control" value="{{ $borrower->step }}"  name="step"/>
                  </div>
                  <div class="form-group">    
                      <label for="monthly_sales">Monthly Sales</label>
                      <input type="text" id="monthly_sales" class="form-control" value="{{ $borrower->monthly_sales }}" name="monthly_sales"/>
                  </div>
                  <div class="form-group">
                      <label for="monthly_expenses">Monthly Expenses</label>
                      <input type="text" id="monthly_expenses" class="form-control" value="{{ $borrower->monthly_expenses }}" name="monthly_expenses"/>
                  </div>
                  <div class="form-group">
                      <label for="other_financing">Other Financing</label>
                      <input type="number" min="0" id="other_financing" class="form-control" value="{{ $borrower->other_financing }}" name="other_financing"/>
                  </div>
                  <div class="form-group">
                      <label for="other_financing_amount">Other Financing Amount</label>
                      <input type="text" id="other_financing_amount" class="form-control" value="{{ $borrower->other_financing_amount }}" name="other_financing_amount"/>
                  </div>
                  <div class="form-group">
                      <label for="legal_business_name">Legal Business Name</label>
                      <input type="text" id="legal_business_name" class="form-control" value="{{ $borrower->legal_business_name }}" name="legal_business_name"/>
                  </div>
                  <div class="form-group">
                      <label for="business_physical_address">Business Physical Address</label>
                      <input type="text" class="form-control" id="business_physical_address" value="{{ $borrower->business_physical_address }}" name="business_physical_address"/>
                  </div> 
                  <div class="form-group">
                      <label for="business_physical_city">Business Physical City</label>
                      <input type="text" id="business_physical_city" class="form-control" value="{{ $borrower->business_physical_city }}" name="business_physical_city"/>
                  </div>  
                   <div class="form-group">
                      <label for="business_physical_province">Business Physical Province</label>
                      <input type="text" class="form-control" id="business_physical_province" value="{{ $borrower->business_physical_province }}" name="business_physical_province"/>
                  </div>  
                   <div class="form-group">
                      <label for="business_physical_postal">Business Physical Postal</label>
                      <input type="text" class="form-control" id="business_physical_postal" value="{{ $borrower->business_physical_postal }}" name="business_physical_postal"/>
                  </div>  
                   <div class="form-group">
                      <label for="job_title">Email</label>
                      <input type="email" class="form-control" value="{{$borrower->email }}" id="email" name="email"/>
                  </div>  
                   <div class="form-group">
                      <label for="job_title">Date of Birth</label>
                      <input type="date" id="dob" value="{{ $borrower->dob }}" class="form-control" name="dob"/>
                  </div>                         
              <button type="submit" class="btn btn-primary">Update</button>
          </form>
      </div>
  </div>
</div>
@endsection