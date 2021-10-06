<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-6"> Employee Master Table</div>
                    <div class="col-md-6"><a href="{{ route('employeeadd') }}" class="btn btn-primary pull-right">Register New Employee</a> </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($employees as $employee)

                      <tr>
                        <td><img src="{{ asset('images/employee') }}/{{ $employee->image}}" width="120px"></td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->designation->name; }}</td>
                        <td>
                            <a href="{{ route('employeeedit',['id' => $employee->id]) }}"><li class="fa fa-edit fa-2x text-info"></li></a>
                            <a href="#" onclick="confirm('Are you sure, You want to delete this employee ?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteEmployee({{ $employee->id }})"><li class="fa fa-times fa-2x text-danger"></li></a>
                        </td>
                      </tr>

                      @endforeach


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




