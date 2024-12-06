<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-[#3b4a1b] font-sans">

    <!-- Navbar -->
    <header class="fixed top-0 w-full bg-[#3b4a1b] text-white shadow-lg">
        <div class="flex justify-between items-center px-10 py-4">
            <div class="text-2xl font-bold">Kripe!</div>
            <nav class="flex gap-8">
                <a href="#hero" class="hover:text-white">Home</a>
                <a href="#about-us" class="hover:text-white">About Us</a>
                <a href="#products-section" class="hover:text-white">Product</a>
            </nav>
        </div>
    </header>

    <!-- Products Section -->
    <section id="products-section" class="px-10 py-20 text-center bg-white">
        <h1 class="text-4xl font-bold text-[#3b4a1b] mb-10">Our Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach($kripes as $kripe)
            <div class="bg-white rounded-lg shadow p-6">
                <img src="{{ asset('storage/' . $kripe->image) }}" alt="{{ $kripe->name }}" class="w-full rounded-md mb-4">
                <h2 class="text-2xl font-bold mb-2">{{ $kripe->name }}</h2>
                <p class="text-[#3b4a1b] mb-4">Harga: Rp. {{ number_format($kripe->price, 0, ',', '.') }}</p>
                <div class="flex justify-center items-center gap-4 mb-4">
                    <button class="bg-[#3b4a1b] text-white px-4 py-2 rounded-full hover:bg-[#3b4a1b]">-</button>
                    <input type="number" value="1" min="1" readonly class="w-12 text-center border rounded-md">
                    <button class="bg-[#3b4a1b] text-white px-4 py-2 rounded-full hover:bg-[#3b4a1b]">+</button>
                </div>
                <button class="bg-[#3b4a1b] text-white px-6 py-2 rounded-full hover:bg-[#3b4a1b]">Buy Now</button>
            </div>
            @endforeach
        </div>
    </section>

</body>
</html>
