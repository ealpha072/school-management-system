$(document).ready(function() {

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });

    $('#manage-st').on('click', function() {
        var results_div = $('#result-holder');
        var request = new XMLHttpRequest
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                results_div.html('')
                results_div.html(request.responseText)
            }
        }

        var form = $('#class-option').find(":selected").text()
        var stream = $('#stream-option').find(":selected").text()
        var query = '?form_name=' + form + '&stream_name=' + stream

        request.open('GET', '../shared/process.php' + query, true)
        request.send(null)
    })

    $('#search-student').on('click', function() {
        var results_div = $('#result-holder')
        var request = new XMLHttpRequest
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                results_div.html('')
                results_div.html(request.responseText)
            }
        }

        var searchValue = $('#adm-no').val()
        var queryString = '?admnum=' + searchValue
        request.open('GET', '../shared/process.php' + queryString, true)
        request.send(null)
    })

    $('#manage-subject').on('change', function() {
        var results_div = $('#result-holder')
        var request = new XMLHttpRequest
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                results_div.html('')
                results_div.html(request.responseText)
            }
        }
        var searchValue = $('#manage-subject').find(':selected').text()
        var queryString = '?to_find_subj=' + searchValue
        request.open('GET', '../shared/process.php' + queryString, true)
        request.send(null)
    })

    $('#to-find-teacher').on('change', function() {
        var results_div = $('#result-holder')
        var request = new XMLHttpRequest

        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                results_div.html('')
                results_div.html(request.responseText)
            }
        }

        var searchValue = $('#to-find-teacher').find(':selected').text()
        var nameArray = searchValue.trim().split(' ')

        var queryString = `?name_1=${nameArray[0]}&name_2=${nameArray[1]}&name_3=${nameArray[2]}`
        request.open('GET', '../shared/process.php' + queryString, true) 
        request.send(null)
    })

    $('#manage-parent').on('click',function () {
        var results_div = $('#results-holder')
        var request = new XMLHttpRequest

        request.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                results_div.html('')
                results_div.html(request.responseText)
            }
        }

        var form = $('#class-option').find(":selected").text()
        var stream = $('#stream-option').find(":selected").text()
        var query = `?form_name_parent=${form}&stream_name_parent=${stream}`

        request.open('GET', '../shared/process.php' + query, true)
        request.send(null)

    })
});