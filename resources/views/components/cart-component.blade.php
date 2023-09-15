<a href="/cart" class="flex items-end gap-2 relative">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
        viewBox="0 0 16 16" fill="currentColor">
        <path fill="currentColor"
            d="M14 13.1v-1.1h-9.4l0.6-1.1 9.2-0.9 1.6-6h-12.3l-0.7-3h-3v1h2.2l2.1 8.4-1.3 2.6v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5-0.7-1.5-1.5-1.5h7.5v1.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5c0-0.7-0.4-1.2-1-1.4z">
        </path>
    </svg>
    <span>Cart</span>
    <span id="cartCount" class="px-3 py-1 bg-blue-500 text-white rounded-full font-medium absolute -top-6 -right-7">{{ count($orders) }}</span>
</a>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#cartCount').on('load', function() {
                var xhr = new XMLHttpRequest();
                var resourceId = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/cart/store',
                    data: {
                        _token: '{{ csrf_token() }}' // Add CSRF token for security
                    },
                    success: function(data) {
                        alert('Book Added to Cart');
                    }
                });
            });
        });
    </script>
