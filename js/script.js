// Inicializa o carrinho da sessão, se ainda não estiver inicializado
let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

// Certifique-se de que os elementos foram encontrados antes de continuar
const cartItems = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');
const cartCount = document.getElementById('cart-count');

if (!cartItems || !cartTotal || !cartCount) {
  console.error('Elementos do carrinho não encontrados.');
}

function addToCart(productName, price, productId) {
  const product = {
    id: productId,
    name: productName,
    price: price,
    quantity: 1
  };

  const existingProductIndex = cart.findIndex(item => item.id === productId);

  if (existingProductIndex !== -1) {
    cart[existingProductIndex].quantity += 1;
  } else {
    cart.push(product);
  }

  // Adiciona o produto à tabela carrinho no banco de dados
  addToDatabase(productId, 1);

  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
  alert(`Produto "${productName}" adicionado ao carrinho com sucesso!`);
}

function updateCart() {
  if (!cartItems || !cartTotal || !cartCount) {
    console.error('Elementos do carrinho não encontrados.');
    return;
  }

  cartItems.innerHTML = '';
  let total = 0;

  cart.forEach((item) => {
    const li = document.createElement('li');
    li.textContent = `${item.name}: R$${item.price.toFixed(2)} x ${item.quantity}`;

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remover';
    removeButton.onclick = () => removeFromCart(item.id);

    li.appendChild(removeButton);

    // Adiciona um campo de input para a quantidade
    const quantityInput = document.createElement('input');
    quantityInput.type = 'number';
    quantityInput.value = item.quantity;
    quantityInput.min = '1';
    quantityInput.addEventListener('change', (event) => updateQuantity(item.id, event.target.value));
    li.appendChild(quantityInput);

    cartItems.appendChild(li);
    total += item.price * item.quantity;
  });

  cartTotal.textContent = total.toFixed(2);
  cartCount.textContent = cart.length;
}

function removeFromCart(productId) {
  cart = cart.filter(item => item.id !== productId);

  // Remove o produto da tabela carrinho no banco de dados
  removeFromDatabase(productId);

  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
}

function updateQuantity(productId, newQuantity) {
  cart.forEach(item => {
    if (item.id === productId) {
      item.quantity = parseInt(newQuantity);
    }
  });

  // Atualiza a quantidade na tabela carrinho no banco de dados
  updateQuantityInDatabase(productId, newQuantity);

  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
}

function addToDatabase(productId, quantity) {
  // Adicione o código para adicionar o produto ao banco de dados aqui
}

function removeFromDatabase(productId) {
  // Adicione o código para remover o produto do banco de dados aqui
}

function updateQuantityInDatabase(productId, newQuantity) {
  // Adicione o código para atualizar a quantidade no banco de dados aqui
}
