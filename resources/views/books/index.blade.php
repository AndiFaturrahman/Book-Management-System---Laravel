<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-bold">WELCOME ! {{ Auth::user()->email }}</a>
            <div>
                @if (Auth::user()->role == 0)
                    <a href="{{ route('books.create') }}" class="text-white mr-4">Create New Book</a>
                @endif
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Books List</h1>
        @if ($message = Session::get('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ $message }}',
                    });
                });
            </script>
        @endif
        <div class="overflow-x-auto">
            <table id="booksTable" class="min-w-full bg-white border-collapse">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Title</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Author</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Publisher</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Publication Year</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">ISBN</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Pages</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Language</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Price</th>
                        <th class="py-3 px-4 border-b-2 border-gray-300 text-left text-sm uppercase font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $book)
                        <tr>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->title }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->author }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->publisher }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->publication_year }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->isbn }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->pages }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->language }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">{{ $book->price }}</td>
                            <td class="py-3 px-4 border-b border-gray-300">
                                <a href="{{ route('books.show', $book->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                @if(Auth::user()->role == 0)
                                    <a href="{{ route('books.edit', $book->id) }}" class="ml-2 text-yellow-500 hover:text-yellow-700">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#booksTable').DataTable();

            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>