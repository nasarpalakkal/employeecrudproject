<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Registation Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('message'))
              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
              @endif
              <form enctype="multipart/form-data" wire:submit.prevent="addEmployee">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Employee Name" wire:model="name">
                    @error('name') <p class="text-danger">{{ $message }}</p>@enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" placeholder="Employee Email" wire:model="email">
                    @error('email') <p class="text-danger">{{ $message }}</p>@enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" wire:model="image">
                    @if($image)
                    <img src="{{ $image->temporaryUrl() }}" width="120" >
                    @endif
                    @error('image') <p class="text-danger">{{ $message }}</p>@enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <select class="form-control" wire:model="designation_id">
                        <option value="">-Select Designation-</option>
                        @foreach ($desigantions as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </select>
                    @error('designation_id') <p class="text-danger">{{ $message }}</p>@enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->





          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

