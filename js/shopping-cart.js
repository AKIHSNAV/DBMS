class ShoppingCart {
    constructor() {
        this.items = [];
    }

    addItem(item) {
        this.items.push(item);
        this.updateCart();
    }

    removeItem(item) {
        const index = this.items.indexOf(item);
        if (index != -1) {
            this.items.splice(index, 1);
            this.updateCart();
        }
    }

    

    updateCart() {
        const cartItems = document.getElementById("cart-items");
        cartItems.innerHTML = "";
        for (const item of this.items) {
            const listItem = document.createElement("div");
            listItem.classList.add("cart-item");
            listItem.innerHTML = `
                <div class="item-details">
                    <h4>${item.name}</h4>
                    <p>Rs. ${item.price}</p>
                    <div class="quantity">
                        <button class="decrease">-</button>
                        <input type="number" value="${item.quantity}">
                        <button class="increase">+</button>
                    </div>
                    <button class="remove">Remove</button>
                </div>
                `;

                // Add event listeners to increase and decrease buttons
                const increaseButton = listItem.querySelector(".increase");
                const decreaseButton = listItem.querySelector(".decrease");
                const quantityInput = listItem.querySelector("input[type='number']");

                increaseButton.addEventListener("click", () => {
                    item.quantity++;
                    quantityInput.value = item.quantity;
                    this.updateCart();
                });

                decreaseButton.addEventListener("click", () => {
                    if (item.quantity > 1) {
                        item.quantity--;
                        quantityInput.value = item.quantity;
                        this.updateCart();
                    }
                });
            cartItems.appendChild(listItem);

            const removeButton = listItem.querySelector(".remove");
            removeButton.addEventListener("click", () => {
                this.removeItem(item);
            });
            
        }
        const totalPriceElement = document.getElementById("total");
        totalPriceElement.textContent = `${cart.getTotalPrice()}`;
    }

    getTotalPrice() {
        let totalPrice = 0;
        
        for (const item of this.items) {
            totalPrice += item.quantity * item.price;
        }
        return totalPrice;
    }
}

class Item {
    constructor(name, price, quantity = 1) {
        this.name = name;
        this.price = price;
        this.quantity = quantity;
    }
}

// Usage example: we can add apna sql connector here

const cart = new ShoppingCart();
const item1 = new Item("Tomatoes", 20);
const item2 = new Item("Carrots", 60);

cart.addItem(item1);
cart.addItem(item2);


