$(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });

    $('#manage-st').on('click', function() {
        var results_div = $('#result-holder');
        var request;

        try {
            request = new XMLHttpRequest
        } catch (error) {
            alert('Your browser doesnt support ajax')
        }

        request.onreadystatechange = function() {
            if (this.readyState === 4 && request.status === 200) {
                results_div.html('')
                results_div.html(request.responseText)
            }
        }

        var form = $('#class-option').val()
        var stream = $('#stream-option').val()
        var query = '?form_name=' + form + '&stream_name=' + stream

        request.open('GET', '../requests/managest.php' + query, true)
        request.send(null)
    })
});