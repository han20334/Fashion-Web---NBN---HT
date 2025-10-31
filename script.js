// Tính tổng giá sản phẩm
document.addEventListener('DOMContentLoaded', () => {
    const products = document.querySelectorAll('.product-card');
    let total = 0;

    products.forEach(product => {
        const price = parseInt(product.getAttribute('data-price')) || 0;
        total += price;
    });

    document.getElementById('total-value').textContent = total;
});