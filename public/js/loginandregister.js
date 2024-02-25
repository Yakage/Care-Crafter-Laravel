if (document.getElementById('messageDialog').innerHTML.trim() !== '') {
    document.getElementById('messageDialog').style.display = 'block';
    setTimeout(function() {
        document.getElementById('messageDialog').style.display = 'none';
    }, 3000);
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        // Convert gender input value to lowercase
        var genderInput = document.getElementById('gender');
        genderInput.value = genderInput.value.toLowerCase();
    });
});