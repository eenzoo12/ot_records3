       
       <input type="hidden" name="employee_id" id="emp_id" value="">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label-lg text-md-right">Name</label>

            <div class="col-md-6">
                <input id="name" name="name" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-7">
                    <input id="email" name="email" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

            <div class="col-md-7">
                    <input id="phone" name="phone" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

            <div class="col-md-7">
                <select id="position" class="form-control" name="position" style=" height: calc(1.6em + 0.75rem + 2px); " required>
                    <option class="hidden"  selected disabled>Please select your Position</option>
                    @foreach ($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

            <div class="col-md-7">
                <select id="department" class="form-control" name="department" style=" height: calc(1.6em + 0.75rem + 2px); " required>
                    <option class="hidden"  selected disabled>Please select your Department</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>