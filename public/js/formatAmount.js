function formatNumber (number) {
    let formattedNumber = number.replace(/[^0-9.]/g, '');

    let parts = formattedNumber.split('.');
    if (parts.length > 1) {
        parts[1] = parts[1].slice(0, 2);
        formattedNumber = parts.join('.');
    }

    const points = formattedNumber.split('.').length - 1;
    if (points > 1) {
        formattedNumber = formattedNumber.replace(/\./g, (match, offset, string) => {
            return offset ? '' : match;
        });
    }

    return formattedNumber;
}

const amountInput = document.getElementById('amount');

amountInput.addEventListener('input', (event) => {
    const valor = event.target.value;
    const formattedNumber = formatNumber(valor);
    event.target.value = formattedNumber;
});