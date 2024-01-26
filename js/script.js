// Inicializa o carrinho da sessão, se ainda não estiver inicializado
let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

function addToCart(productName, price, productId) {
  // Adiciona o produto ao carrinho com a quantidade padrão de 1
  const product = {
    id: productId,
    name: productName,
    price: price,
    quantity: 1 // Quantidade padrão é 1
  };

  // Verifica se o produto já está no carrinho
  const existingProductIndex = cart.findIndex(item => item.id === productId);

  if (existingProductIndex !== -1) {
    // Se o produto já estiver no carrinho, apenas atualiza a quantidade
    cart[existingProductIndex].quantity += 1;
  } else {
    // Se o produto não estiver no carrinho, adiciona ao carrinho
    cart.push(product);
  }

  // Atualiza o carrinho na sessão
  sessionStorage.setItem('cart', JSON.stringify(cart));

  // Atualiza o número de itens no carrinho no ícone do carrinho no cabeçalho
  updateCart();

  // Adiciona uma mensagem indicando que o produto foi adicionado com sucesso
  alert(`Produto "${productName}" adicionado ao carrinho com sucesso!`);
}

function updateCart() {
  const cartItems = document.getElementById('cart-items');
  const cartTotal = document.getElementById('cart-total');
  const cartCount = document.getElementById('cart-count');

  // Certifique-se de que os elementos foram encontrados antes de continuar
  if (!cartItems || !cartTotal || !cartCount) {
    console.error('Elementos do carrinho não encontrados.');
    return;
  }

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
}

function removeFromCart(productId) {
  let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
  cart = cart.filter(item => item.id !== productId);
  sessionStorage.setItem('cart', JSON.stringify(cart));
  updateCart();
}

function checkout() {
  alert('This is just a demo. No real checkout process is implemented.');
}

function goToCart() {
  window.location.href = 'carrinho.php'; // Altere para o caminho correto da página de carrinho
}
