<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>weclomehhh</h1>
    
        
        <div class="container mt-5">
        <h2>Books List</h2>
        <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Add New Book</a>
        
        @if($books->isEmpty())
            <p>No books found</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Genre</th>
                        <th>Publisher</th>
                        <th>Category</th>
                        <th>Path</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->path }}</td>
                            <td>
                                
                                <a href="{{route('book.edit',['book' => $book])}}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('book.delete', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>