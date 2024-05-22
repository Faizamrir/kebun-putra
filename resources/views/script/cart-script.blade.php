
<script>
    
    function updateCart(id, qty) {
        $.ajax({
            method: "PUT",
            url: "/update-cart/"+ id,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: "{{ csrf_token() }}",
                no_produk: id,
                jumlah: qty,
            },
            success: function (response) {
            },
            error: function(xhr, status, error) {
            }
        });
    }

    function removeCart(id, callback) {
        $.ajax({
            method: "DELETE",
            url: "/removeitem/"+ id,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: "{{ csrf_token() }}",
                no_produk: id,
            },
            success: function (response) {
                if (typeof callback === "function") {
                callback(id);
                }
            },
            error: function(xhr, status, error) {
            }
        });
    }
    
    function removeItemFromModal(id) {
    $('#item_' + id).remove(); // Assuming each item in the modal has an ID like 'item_{{ $item->id }}'
    }

    function cart() {
        return {
            subtotal: 0,
            total: 0,
            vat: 0,
            discount: 0,
            items: @json($keranjangs),

            init() {
                this.calculateTotals();
            },

            updateQTY(productId, quantity) {
                // let item = this.items.find(item => item.id === productId);
                // if (item) {
                //     item.jumlah = parseInt(quantity);
                //     this.calculateTotals();
                // }
                let index = this.items.findIndex(item => item.id === productId);
                if (index !== -1) {
                    // Remove the item from the array
                    this.items[index].jumlah = parseInt(quantity);
                    // this.items.splice(index, 1);
                    this.calculateTotals();
                }
            },

            removeItem(productId) {
                removeCart(productId, removeItemFromModal(productId));
                this.items = this.items.filter(item => item.id !== productId);
                this.calculateTotals();
            },

            calculateTotals() {
                this.subtotal = this.items.reduce((sum, item) => sum + (item.product.harga * item.jumlah), 0);
                this.vat = this.subtotal * 0.1; // Example VAT calculation
                this.discount = this.subtotal * 0; // Example discount calculation
                this.total = this.subtotal + this.vat - this.discount;
            },

            checkout() {
                console.log(this.items);
                $.ajax({
                    method: "POST",
                    url: "/checkout",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _token: "{{ csrf_token() }}",
                        items: this.items,
                        total: this.total
                    },
                    success: function (response) {
                        window.location.href = response.payment_url;
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                    }
                })
            },
        }
    }

</script>
