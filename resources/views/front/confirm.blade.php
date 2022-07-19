<form class="row g-3 needs-validation" novalidate action="{{ route('store.order',$id) }}" method="POST">
    @csrf
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ Auth::user()->name }}" required>
       @error('name')
       <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
        @enderror
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 ">
      <label for="validationCustom02" class="form-label">Phone</label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">+212</span>
      <input type="text" class="form-control" id="validationCustom02" name="phone" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
    
    
    <div class="col-md-3">
      <label for="validationCustom04" class="form-label">City</label>
      <select class="form-select" id="validationCustom04" name="city" required>
        <option selected disabled value="">Choose...</option>
        <option value="Casablanca">Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Marrakech">Marrakech</option>

      </select>
            @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      <div class="invalid-feedback">
        Please select a valid city.
      </div>
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Address</label>
      <input type="text" class="form-control" id="validationCustom05" name="address" required>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
     
    </div>
    <div class="col-md-6">
        <label for="validationTextarea" class="form-label">Comment</label>
        <textarea class="form-control" id="validationTextarea" name="comment" > </textarea>
        
      </div>
    <div class="col-12">
      <button class="btn btn-primary " type="submit">Order Now</button></form>
    </div>
  

</div>