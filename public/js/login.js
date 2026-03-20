function togglePassword(inputId, eyeId) {
    const input = document.getElementById(inputId);
    const eye   = document.getElementById(eyeId);

    if (input.type === 'password') {
        input.type = 'text';
        eye.style.opacity = '1';
    } else {
        input.type = 'password';
        eye.style.opacity = '0.6';
    }
}