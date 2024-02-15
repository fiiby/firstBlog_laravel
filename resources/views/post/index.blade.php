<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="antialiased bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Blog post</h1>

        <div class="flex justify-between mb-4">
            <div>
                <input type="text" class="border border-gray-300 p-2" placeholder="search tasks">
            </div>

            <a href="{{ route('post.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Post</a>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($post as $post)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-bold mb-2"> {{ $post->title}}</h2>
                <p class="">{{Str::limit($post->content, 100) }}</p>
                <a href="{{ route('post.show', $post->id) }}" class="text-blue-500">More</a>
            </div>

            @empty
            <p class="">No posts found</p>
            @endforelse
        </div>
    </div>

</body>

</html>