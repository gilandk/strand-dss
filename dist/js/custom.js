document.onkeydown = function(e) {
    if (event.keyCode == 123) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
    }
}

function validatePhone(event) {
    //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
    //event.which will return key for mouse events and other events like ctrl alt etc. 
    var key = window.event ? event.keyCode : event.which;

    if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
        // 8 means Backspace
        //46 means Delete
        // 37 means left arrow
        // 39 means right arrow
        return true;
    } else if (key < 48 || key > 57) {
        // 48-57 is 0-9 numbers on your keyboard.
        return false;
    } else return true;
}

//dob
$('#birthdate').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    $('#age').val(age);
});

//datatables
$(function() {
    $('#analytics_categories').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        'order': [2, "desc"],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 20
    });
});

//datatables
$(function() {
    $('#analytics_strands').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        'order': [2, "desc"],
        "autoWidth": true,
        "responsive": true,
        "pageLength": 20
    });
});

//datatables
$(function() {
    $('#reportstrand').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        'order': [2, "desc"],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 100
    });
});

//datatables
$(function() {
    $('#reportexam').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        'order': [0, "asc"],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 100
    });
});

//datatables
$(function() {
    $('#reportcategory').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        'order': [2, "desc"],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 100
    });
});

$(function() {
    $('#school_students').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,

        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

$(function() {
    $('#settings_audit').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        'order': [3, "desc"],
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "pageLength": 50
    });
});

$('#daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    },
    function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
)


/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');


$.widget.bridge('uibutton', $.ui.button);


$('#exam_sched').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'MM/DD/YYYY hh:mm A'
    }
});


$(document).ready(function() {

    // Add Class
    $('.edit').click(function() {
        $(this).addClass('editMode');
    });

    // Save data
    $(".edit").focusout(function() {
        $(this).removeClass("editMode");
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];
        var value = $(this).text();

        $.ajax({
            url: 'update_timer.php',
            type: 'post',
            data: { field: field_name, value: value, id: edit_id },
            success: function(response) {
                console.log('Save successfully');
            }
        });

    });

});

$(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});

$("input[data-bootstrap-switch]").each(function() {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
});

//password
$("#admin").on("submit", function(e) {
    e.preventDefault();
    if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
    } else {
        $(this).unbind('submit').submit();
    }
});

//password
$("#students").on("submit", function(e) {
    e.preventDefault();
    if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
    } else {
        $(this).unbind('submit').submit();
    }
});



//changepassword
$("#changePassword").on("submit", function(e) {
    e.preventDefault();
    if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
    } else {
        $(this).unbind('submit').submit();
    }
});

$(function() {
    //Initialize Select2 Elements
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
});

//confirmation when click
$('.confirmation').on('click', function() {
    var confirmation = confirm('Are you sure to take this exam');
    if (confirmation) {
        return true;
    }
    return false;
});


//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()



document.getElementById('dlexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#analytics_strands"), "top25-strand");
});

document.getElementById('dlexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#analytics_categories"), "top25-category");
});



document.getElementById('dlexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#reportstrand"), "reports_strand");
});


document.getElementById('dlexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#reportcategory"), "reports_category");
});


document.getElementById('dlexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#reportexam"), "reports_exam");
});

function printResult() {
    window.print();
}