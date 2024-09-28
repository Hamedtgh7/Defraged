const input = document.getElementById("text-input");
const reverse = document.getElementById("reverse");

function reversed(script) {
    return script.split('').reverse().join('');
}

input.addEventListener('input', function () {
    const value = input.value;
    reverse.textContent = reversed(value);
})

