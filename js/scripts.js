let cart = [];
let currentBanner = 0;

function addToCart(productName, price, productId) {
  cart.push({ id: productId, name: productName, price: price });
  updateCart();
}

function removeFromCart(index) {
  cart.splice(index, 1);
  updateCart();
}

function updateCart() {
  const cartItems = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');

  cartItems.innerHTML = '';
  let total = 0;

  cart.forEach((item, index) => {
    const li = document.createElement('li');
    li.textContent = `${item.name}: $${item.price.toFixed(2)}`;

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.onclick = () => removeFromCart(index);

    li.appendChild(removeButton);

    cartItems.appendChild(li);
    total += item.price;
  });

  cartTotal.textContent = total.toFixed(2);
}

function checkout() {
  alert('This is just a demo. No real checkout process is implemented.');
}

function goToCart() {
  window.location.href = 'cart.html';
}

const container = document.getElementById('bannerContainer');
let scrollIndex = 0;
const imageWidth = container.clientWidth; // Largura de cada imagem

function scrollImages() {
  scrollIndex++;
  if (scrollIndex >= container.children.length) {
    scrollIndex = 0;
  }

  container.style.transform = `translateX(-${scrollIndex * imageWidth}px)`;
}

// Rolar automaticamente a cada 3 segundos (ajuste conforme necessário)
setInterval(scrollImages, 3000);
