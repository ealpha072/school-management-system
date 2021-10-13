function showResults() {
    var result_div = document.getElementById('result-holder')

    var request;
    try {
        request = new XMLHttpRequest;
    } catch (error) {
        alert("Your browser doesn't support AJAX!!")
    }

    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            result_div.innerHTML = "";
            result_div.innerHTML = request.responseText;
        }
    }

    var form_value = document.getElementById('class-option').value
    var stream_value = document.getElementById('stream-option').value
    var query = "?name="+form_value+"and name="+stream_value

    request.open("GET", "../ajaxfiles/mcourse.php" + query, true);
    request.send(null);

}
