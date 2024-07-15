function toggleInput() {
    var inputDiv = document.getElementById('inputDiv');
    var inputadd = document.getElementById('inputadd');
    if (inputDiv.style.display === 'none' || inputDiv.style.display === '') {
        inputDiv.style.display = 'block';
        inputadd.style.display = 'none';
    } else {
        inputDiv.style.display = 'none';
        inputadd.style.display = 'block';
    }
}