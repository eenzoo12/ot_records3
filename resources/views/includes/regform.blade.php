

<div class="col-md-10">
    <div class="form-group">
        <input id="name" type="text" placeholder="Full Name *" class="form-control" name="name" value="" required>
    </div>
    <div class="form-group">
        <input type="text" minlength="10" placeholder="Phone Number *" maxlength="11" name="phone" class="form-control"  value="" />
    </div>
    <div class="form-group">
        <input id="password" type="password" placeholder="Password *" class="form-control"  name="password" required>
    </div>
    <div class="form-group">
        <input id="password-confirm" type="password" placeholder="Confirm Password *" class="form-control" name="password_confirmation" required>
    </div>
    

    <div class="form-group">
        <input id="email" type="email" placeholder="Email *" class="form-control" name="email" value="" required>
        
    </div>
    <div class="form-group">
        <select class="form-control" name="position" style=" height: calc(1.7em + 0.75rem + 2px); " required>
            <option class="hidden"  selected disabled>--  Select Position --</option>
            @foreach ($positions as $position)
                <option value="{{$position->id}}">{{$position->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="department" style=" height: calc(1.7em + 0.75rem + 2px); " required>
            <option class="hidden"  selected disabled>-- Select Department --</option>
            @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <div class="maxl" style="margin-left:1vw;" >
            <label class="radio inline"> 
                <input type="radio" name="gender" value="male" checked>
                <span> Male </span> 
            </label>
            <label class="radio inline"> 
                <input type="radio" name="gender" value="female">
                <span>Female </span> 
            </label>
        </div>
    </div>
</div>