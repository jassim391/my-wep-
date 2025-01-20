<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .remove-btn, .add-btn {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin: 0 5px;
        }
        .remove-btn:hover, .add-btn:hover {
            background-color: #45a049;
        }
        .total {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .clear-cart {
            margin-top: 20px;
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        .clear-cart:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>

<h1>Your Shopping Cart</h1>

<table id="cartTable">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price (BD)</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Cart items will be displayed here -->
    </tbody>
</table>

<div class="total">
    Total Price: <span id="totalPrice">BD 0</span>
</div>

<!-- Button to clear the entire cart -->
<button class="clear-cart" onclick="clearCart()">Clear Cart</button>
<a href="index.html">
<button  class="clear-cart" >back to home page </button>
</a>
<script>
// Function to load cart from localStorage
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.querySelector('#cartTable tbody');
    const totalPriceElement = document.getElementById('totalPrice');
    
    // Clear the table before reloading the cart items
    cartTableBody.innerHTML = '';
    
    let totalPrice = 0;

    // Loop through cart items and display them in the table
    cart.forEach((item, index) => {
        const row = document.createElement('tr');
        
        const productCell = document.createElement('td');
        productCell.textContent = item.productName;
        
        const priceCell = document.createElement('td');
        priceCell.textContent = item.productPrice;

        const quantityCell = document.createElement('td');
        quantityCell.textContent = item.quantity;

        const actionCell = document.createElement('td');
        const addButton = document.createElement('button');
        addButton.classList.add('add-btn');
        addButton.textContent = '+';
        addButton.onclick = function() {
            addItem(index);
        };
        
        const removeButton = document.createElement('button');
        removeButton.classList.add('remove-btn');
        removeButton.textContent = '-';
        removeButton.onclick = function() {
            removeItem(index);
        };

        actionCell.appendChild(addButton);
        actionCell.appendChild(removeButton);
        
        row.appendChild(productCell);
        row.appendChild(priceCell);
        row.appendChild(quantityCell);
        row.appendChild(actionCell);
        cartTableBody.appendChild(row);

totalPrice += parseFloat(item.productPrice) * item.quantity;  // Convert price to number before calculation
    });

    // Update the total price
    totalPriceElement.textContent = `BD ${totalPrice.toFixed(2)}`;
}

// Function to add an item to the cart (increase its quantity)
function addItem(index) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart[index].quantity += 1;  // Increase quantity of the item
    localStorage.setItem('cart', JSON.stringify(cart));  // Save updated cart to localStorage
    loadCart();  // Reload the cart display
}

// Function to remove an item from the cart (decrease its quantity or remove it if 1)
function removeItem(index) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart[index].quantity > 1) {
        cart[index].quantity -= 1;  // Decrease quantity
    } else {
        cart.splice(index, 1);  // Remove item if quantity is 1
    }
    localStorage.setItem('cart', JSON.stringify(cart));  // Save updated cart to localStorage
    loadCart();  // Reload the cart display
}

// Function to clear the entire cart
function clearCart() {
    localStorage.removeItem('cart');  // Remove all items from localStorage
    loadCart();  // Reload the cart display
}

// Initial load of the cart when the page is loaded
window.onload = loadCart;
</script>

</body>
</html>
