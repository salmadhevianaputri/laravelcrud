<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kripe!</title>
</head>

<body class="bg-white text-[#3b4a1b] font-sans">

    <!-- Navbar -->
    <header class="fixed top-0 w-full bg-[#3b4a1b] text-white shadow-lg">
        <div class="flex justify-between items-center px-10 py-4 container mx-auto px-4">
            <div class="text-2xl font-bold">Kripe!</div>
            <nav class="flex gap-8">
                <a href="#hero" class="hover:text-white">Home</a>
                <a href="#about-us" class="hover:text-white">About Us</a>
                <a href="#products-section" class="hover:text-white">Product</a> <!-- Direct to products page -->
            </nav>
            <a href="#" id="openSignupModal" class="bg-white text-[#3b4a1b] px-4 py-2 rounded-full shadow hover:bg-gray-100 font-bold">
                Sign up
            </a>
        </div>
    </header>

    <!-- Modal -->
    <div id="signupModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
            <h2 class="text-xl font-bold mb-4">Sign Up</h2>
            <form id="signupForm">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <button type="submit" class="bg-[#3b4a1b] text-white px-4 py-2 rounded-full w-full hover:bg-green-700">
                    Sign Up
                </button>
            </form>
            <button id="closeSignupModal" class="mt-4 text-gray-500 underline hover:text-gray-800 w-full">
                Close
            </button>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="hero" class="flex flex-col md:flex-row items-center justify-between px-10 py-20 mt-20 bg-white container mx-auto px-4">
        <div class="text-center md:text-left">
            <h1 class="text-6xl font-bold text-[#3b4a1b]">Kripe!</h1>
            <p class="text-lg text-gray mt-6">An ideal snack, enjoy it as a daily snack, a side dish with rice, or even as a conversation starter.</p>
        </div>
        <div class="mt-10 md:mt-0">
            <img src="{{ asset('images/tempe.png') }}" alt="Kripik Tempe" style="width: 600px;" class="rounded-lg shadow">
        </div>
    </section>

    <!-- About Us Section -->
<section id="about-us" class="px-[200px] py-20 bg-[#3b4a1b] text-white text-center">
    <h1 class="text-4xl font-bold mb-6">About Us</h1>
    <p class="text-justify">Kripe! mempersembahkan kripik tempe, camilan favorit yang diolah dari tempe tradisional menjadi modern, lezat, dan kaya protein. Dengan kemasan praktis dan cita rasa gurih, Kripik Tempe siap dinikmati kapan saja, memuaskan selera Anda dan keluarga.</p>
    <p class="text-justify">Sebagai produk foodpreneur, kami mengedepankan kualitas dengan bahan pilihan dan proses produksi yang higienis. Dengan menggunakan bahan baku lokal, kami tidak hanya mendukung pertanian dan ekonomi setempat, tetapi juga berkomitmen pada keberlanjutan.</p>
    <p class="text-justify">Kripik Tempe adalah pilihan ideal untuk semua kalangan, menawarkan kombinasi rasa lezat dan kandungan gizi yang baik, menjadikannya camilan sehat yang disukai oleh seluruh keluarga.</p>
</section>



    <!-- Products Section -->
    <section id="products-section" class="px-10 py-20 text-center bg-white">
        <h1 class="text-4xl font-bold text-[#3b4a1b] mb-10">Our Products</h1>
        <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $product->image) }}" style="width: 250px; height: auto;" alt="{{ $product->name }}" class="rounded-md mb-4">
            </div>
                <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
                <p class="text-[#3b4a1b] mb-4">Harga: Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="flex justify-center items-center gap-4 mb-4">
                    <button id="decrease-qty-{{ $product->id }}" class="bg-[#3b4a1b] text-white px-4 py-2 rounded-full hover:bg-[#3b4a1b]">-</button>
                    <input id="quantity-{{ $product->id }}" type="number" value="1" min="1" readonly class="w-12 text-center border rounded-md">
                    <button id="increase-qty-{{ $product->id }}" class="bg-[#3b4a1b] text-white px-4 py-2 rounded-full hover:bg-[#3b4a1b]">+</button>
                </div>
                <button class="bg-[#3b4a1b] text-white px-6 py-2 rounded-full hover:bg-[#3b4a1b] buy-btn" data-product-id="{{ $product->id }}">Buy Now</button>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Modal Popup -->
    <div id="buyNowModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Purchase Confirmation</h2>
            <p id="modalProductInfo" class="mb-4">Are you sure you want to purchase this product?</p>
            <div class="flex justify-end gap-4">
                <button id="cancelPurchase" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
                <button id="confirmPurchase" class="bg-[#3b4a1b] text-white px-4 py-2 rounded hover:bg-green-700">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#3b4a1b] text-white py-8">
        <div class="container mx-auto text-center px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-lg font-bold">Kripe!</h1>
                    <p class="text-sm">The best snack to accompany your day.</p>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="text-white hover:underline">Privacy Policy</a>
                    <a href="#" class="text-white hover:underline">Terms of Service</a>
                    <a href="#about-us" class="text-white hover:underline">About Us</a>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-xs">&copy; 2024 Kripe! All rights reserved.</p>
            </div>
        </div>
    </footer>



    <!-- JS Code -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Elements for modal
    const buyNowModal = document.getElementById('buyNowModal');
    const modalProductInfo = document.getElementById('modalProductInfo');
    const cancelPurchase = document.getElementById('cancelPurchase');
    const confirmPurchase = document.getElementById('confirmPurchase');
    const increaseButtons = document.querySelectorAll('[id^="increase-qty-"]');
    const decreaseButtons = document.querySelectorAll('[id^="decrease-qty-"]');

    let selectedProductId = null; // Track selected product

    // Handle Buy Now buttons
    const buyButtons = document.querySelectorAll('.buy-btn');

    buyButtons.forEach(button => {
        button.addEventListener('click', function () {
            selectedProductId = this.getAttribute('data-product-id');
            const quantity = document.getElementById(`quantity-${selectedProductId}`).value;

            // Update modal content
            modalProductInfo.textContent = `Are you sure you want to purchase Product ID ${selectedProductId} with quantity ${quantity}?`;
            
            // Show modal
            buyNowModal.classList.remove('hidden');
        });
    });

    // Cancel button
    cancelPurchase.addEventListener('click', function () {
        buyNowModal.classList.add('hidden');
        selectedProductId = null; // Reset selected product
    });

    // Increase quantity
    increaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.id.split('-')[2]; // Ambil ID produk
            const quantityInput = document.getElementById(`quantity-${productId}`);
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1; // Tambahkan kuantitas
        });
    });

    // Decrease quantity
    decreaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.id.split('-')[2]; // Ambil ID produk
            const quantityInput = document.getElementById(`quantity-${productId}`);
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) { // Jangan kurang dari 1
                quantityInput.value = currentValue - 1; // Kurangi kuantitas
            }
        });
    });

    // Confirm Purchase
    confirmPurchase.addEventListener('click', function () {
        if (selectedProductId) {
            const quantity = parseInt(document.getElementById(`quantity-${selectedProductId}`).value);

            console.log('Buying product:', selectedProductId, 'with quantity:', quantity); // Debug log

            // Nonaktifkan tombol untuk mencegah submit ganda
            confirmPurchase.disabled = true;

            fetch('/buy', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: selectedProductId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                confirmPurchase.disabled = false; // Aktifkan tombol kembali setelah respons diterima

                if (data.success) {
                    console.log('Product purchase successful:', data); // Debug log
                    alert(data.message);
                    // Update kuantitas di UI jika perlu
                    const stockDisplay = document.getElementById(`stock-${selectedProductId}`);
                    if (stockDisplay) {
                        stockDisplay.textContent = `Stok: ${data.remaining_quantity}`;
                    }
                } else {
                    console.log('Error purchasing product:', data); // Debug log
                    alert(data.message);
                }
                buyNowModal.classList.add('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, silakan coba lagi.');
                buyNowModal.classList.add('hidden');
                confirmPurchase.disabled = false; // Aktifkan tombol kembali setelah error
            });
        }
    });
});
</script>


</body>

</html>
