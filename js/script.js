let cart = [];

function addToCart(productName, price, productId) {
  // Acesse o carrinho da sessão
  let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

  // Verifica se o produto já está no carrinho
  const existingProduct = cart.find(item => item.id === productId);

  if (existingProduct) {
    // Se o produto já estiver no carrinho, apenas aumenta a quantidade
    existingProduct.quantity += 1;
  } else {
    // Se o produto não estiver no carrinho, adiciona ao carrinho com quantidade 1
    cart.push({ id: productId, name: productName, price: price, quantity: 1 });
  }
  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
}

function removeFromCart(productId) {
  let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
  cart = cart.filter(item => item.id !== productId);
  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
}

function updateCart() {
  const cartItems = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  const cartCount = document.getElementById('cart-count');

  // Obtém o carrinho da sessão
  let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

  cartItems.innerHTML = '';
  let total = 0;

  cart.forEach((item, index) => {
    const li = document.createElement('li');
    li.textContent = `${item.name}: R$${item.price.toFixed(2)} x ${item.quantity}`;

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remover';
    removeButton.onclick = () => removeFromCart(item.id);

    li.appendChild(removeButton);

    cartItems.appendChild(li);
    total += item.price * item.quantity;
  });

  cartTotal.textContent = total.toFixed(2);
  cartCount.textContent = cart.length;

  // Atualiza o número de itens no carrinho no ícone do carrinho no cabeçalho
  // Aqui está o problema
  //cartCount.textContent = cart.length;
}

function checkout() {
  alert('This is just a demo. No real checkout process is implemented.');
}

function goToCart() {
  window.location.href = 'carrinho.php'; // Altere para o caminho correto da página de carrinho
}
