document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('pedidoForm');
    const totalSpan = document.getElementById('total');

    form.addEventListener('change', function () {
        const papasPrice = getPrice(form['papas']);
        const bebidaPrice = getPrice(form['bebida']);

        const total = papasPrice + bebidaPrice;
        totalSpan.textContent = total.toFixed(2);
    });

    function getPrice(radioGroup) {
        for (const radio of radioGroup) {
            if (radio.checked) {
                return parseFloat(radio.value.split('$')[1]) || 0;
            }
        }
        return 0;
    }
});