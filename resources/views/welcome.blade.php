@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Thank You!!!
        </div>
        <div class="card-body">
          <video width="420" controls>
            <source src="./vid/Backflow.mp4" type="video/mp4">
              Your browser does not support the video tag.
          </video>
        </div>
    </div>
      <div class="card bg-light mt-3">
          <div class="card-header">
              Import the BPAlerts.csv
          </div>
          <div class="card-body">
              <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="file" class="form-control">
                  <br>
                  <button class="btn btn-success">Import Data</button>
                  <a class="btn btn-warning" href="{{ route('export') }}">Export Data</a>
              </form>
              <br>
              <table class="table">
                 <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Systolic A</td>
                    <td>Systolic B</td>
                    <td>Diastolic A</td>
                    <td>Diastolic B</td>
                    <td>Alert</td>
                    <td>Actions</td>
                 </tr>
                 @foreach ($data as $row)
                 <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->systolic_a }}</td>
                    <td>{{ $row->systolic_b }}</td>
                    <td>{{ $row->diastolic_a }}</td>
                    <td>{{ $row->diastolic_b }}</td>
                    <td>{{ $row->alert }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                         <form action="{{ route('csv.destroy', $row->id) }}" method="POST">
                             @csrf
                             @method('DELETE')

                             <button type="submit" title="delete" class="btn btn-danger">
                                 Delete
                             </button>
                         </form>
                     </td>
                 </tr>
                 @endforeach
              </table>
          </div>
      </div>
  </div>

@endsection
