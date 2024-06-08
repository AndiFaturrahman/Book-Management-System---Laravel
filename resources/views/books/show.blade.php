<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-bold">MyBookApp</a>
            <div>
                <a href="{{ route('books.index') }}" class="text-white mr-4">Books</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Show Book</h1>
        <a href="{{ route('books.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Back to Books List</a>

        <div class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Title:</strong>
                <span class="text-gray-800">{{ $book->title }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Author:</strong>
                <span class="text-gray-800">{{ $book->author }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Publisher:</strong>
                <span class="text-gray-800">{{ $book->publisher }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Publication Year:</strong>
                <span class="text-gray-800">{{ $book->publication_year }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">ISBN:</strong>
                <span class="text-gray-800">{{ $book->isbn }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Pages:</strong>
                <span class="text-gray-800">{{ $book->pages }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Language:</strong>
                <span class="text-gray-800">{{ $book->language }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Description:</strong>
                <span class="text-gray-800">{{ $book->description }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700 font-bold mb-1">Price:</strong>
                <span class="text-gray-800">{{ $book->price }}</span>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                icon: 'info',
                title: 'Book Details',
                text: 'You are viewing the details of the book "{{ $book->title }}".'
            });
        });
    </script>
</body>
</html>