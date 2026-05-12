@extends('layouts.app')

@push('main')
<div class="container">
    <h2>AWS S3 Files</h2>
    <div class="row justify-content-center">
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="border: 2px solid black">
                <div class="col-sm-9">
                    <input type="file" name="file" class="form-control m-3" required>

                </div>
                <div class="col-sm-3 justify-content-end">
                    <button class="btn btn-primary mx-auto my-3 ">Upload File</button>
            </div>
            </div>
            
        </form>

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
@endpush('main')

