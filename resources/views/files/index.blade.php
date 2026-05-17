@extends('layouts.app')

@section('main')
<div class="container">
    <h2>AWS S3 Files</h2>
    <div class="row justify-content-center">
        {{-- <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="border: 2px solid black">
                <div class="col-sm-9">
                    <input type="file" name="file" class="form-control m-3" required>

                </div>
                <div class="col-sm-3 justify-content-end">
                    <button class="btn btn-primary mx-auto my-3 ">Upload File</button>
            </div>
            </div>
            
        </form> --}}

        <div class="col-md-12">
            <h2>How to Export Files</h2>
        <ul>

            <li>Today topic is how to export file </li>
                <li>we are using maatwebsite/excel package for export file</li>
                <li>first we need to create export class using command "php artisan make:export FileDataExport --model=File"</li>
                <li>after creating export class we need to implement two methods collection and headings in that class</li>
                <li>collection method is used to get data from database and return it as a collection</li>
                <li>headings method is used to define the headings of the excel file</li>
                <li>after implementing the export class we need to create a route for export file and call the export class in that route</li>
                <li>finally we need to create a button in our view file to trigger the export functionality</li>
        </ul>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('file.export') }}" class="btn btn-success m-3">Export to Excel</a>
        </div>
</div>



        <div class="col-md-12">
            <p>Here you can manage your AWS S3 files.</p>
           <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Path</th>
                    <th scope="col">Mime Type</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->title }}</td>
                    <td class="text-muted small">{{ $file->path }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $file->mime_type }}</span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('file.show', $file->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('file.destroy', $file->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </div>
</div>
@endsection

